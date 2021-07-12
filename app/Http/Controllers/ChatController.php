<?php

namespace App\Http\Controllers;

use App\CoinUsed;
use App\Common;
use Illuminate\Http\Request;
use App\Thread;
use App\Participant;
use App\Message;
use App\MessageNotification;
use App\RequestTutor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function jobChatList(Request $request)
    {
        $user_id = session('user_id');

        $thread_ids = Participant::where('user_id', $user_id)->get()->pluck('thread_id')->toArray();

        $data = Participant::whereIn('thread_id', $thread_ids)
            ->join('threads', 'threads.id', '=', 'participants.thread_id')
            ->join('request_tutors', 'threads.requirement_id', '=', 'request_tutors.id')
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->select(
                'threads.id as thread_id',
                'participants.user_id as user_id',
                'users.name as username',
                'request_tutors.id as post_id',
                'request_tutors.subject',
                'request_tutors.location',
                'request_tutors.is_closed',
                'threads.created_at'
            );

        if (isset($request->id)) {
            $data = $data->where('request_tutors.id', '=', $request->id);
        }

        $data = $data->where('user_id', '!=', $user_id)
            ->where('request_tutors.is_closed', 0)
            ->get();

        foreach ($data as $key => $value) {

            $getLastMsg = Message::where('thread_id', $value->thread_id)->orderBy('created_at', 'desc')->first();

            if ($getLastMsg) {
                $value->last_message = $getLastMsg->body;
            }
        }

        return view('chat-list')->with('data', $data)->with('user_id', $user_id);
    }

    public function viewMessage(Request $request)
    {

        $user_id = session('user_id');

        $validate = Thread::join('participants', 'participants.thread_id', '=', 'threads.id')
            ->where('threads.id', $request->mThread)
            ->where('participants.user_id', $user_id)->first();

        if (!$validate) {
            Session::flash('error', 'No Message Found');
            return redirect()->back();
        }

        $message_info = Thread::join('participants', 'participants.thread_id', '=', 'threads.id')
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->join('request_tutors', 'threads.requirement_id', '=', 'request_tutors.id')
            ->select(
                'users.id as user_id',
                'threads.requirement_id as post_id',
                'request_tutors.detail as post',
            )
            ->where('user_id', '!=', $user_id)
            ->where('threads.id', $request->mThread)
            ->first();

        $this->messageSeen($request->mThread);

        return view('chat')->with('user_id', $user_id)->with('message_info', $message_info);
    }


    public function getMessages($id)
    {
        $user_id = session('user_id');
        $mThread = $id;

        $html = '';

        $messages = Message::where('thread_id', $mThread)
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->select(
                'messages.*',
                'users.name as username'
            )
            ->get();

        foreach ($messages as $item) {
            if ($item->user_id != $user_id) {
                $html .= '<div class="align_left"><h2 class=" pt-3">' .
                    $item->username . ',
                <span class="pl-5" style="font-size: 10px;padding-left: 0px !important;">' .
                    Common::changeDate($item->created_at)
                    . '</span>
            </h2>
            <p class="other">
                ' . $item->body . '
            </p></div>';
            } else {
                $html .= '<div class="align_right"><h2 class="pt-3 text-right">
                <span class="pl-5" style="font-size: 10px;padding-left: 0px !important;">' .
                    Common::changeDate($item->created_at)
                    . '</span>
            </h2>
            <p class="text-right me">
            ' . $item->body . '
            </p></div>';
            }
        }

        echo $html;
    }

    public function sendMessage(Request $request)
    {

        $message = $request->message;
        $other_user_id = $request->other_user;
        $mThread = $request->mThread;

        $message_id = $this->createMessage($mThread, $message);

        $this->coinUtilized($other_user_id, $mThread);

        $this->createNotification($message_id, $other_user_id);
    }

    public function createMessage($thread_id, $message)
    {
        $user_id = session('user_id');

        $message_id = Message::Create([
            'thread_id' => $thread_id,
            'user_id' => $user_id,
            'body' => $message
        ])->id;

        return $message_id;
    }

    public function createNotification($message_id, $participant_id)
    {
        MessageNotification::Create([
            'message_id' => $message_id,
            'notify_user_id' =>  $participant_id,
        ]);
    }

    public function getNotifications()
    {
        $user_id = session('user_id');

        $thread_ids = Participant::where('user_id', $user_id)->get()->pluck('thread_id')->toArray();

        $data = Participant::whereIn('participants.thread_id', $thread_ids)
            ->join('threads', 'threads.id', '=', 'participants.thread_id')
            ->leftJoin('messages', 'messages.thread_id', '=', 'threads.id')
            ->leftJoin('message_notifications as mn', 'mn.message_id', '=', 'messages.id')
            ->select(
                'threads.requirement_id as post_id',
                'mn.created_at as notification_time',
                DB::raw('count(*) as msg_count'),
            )
            ->where('participants.user_id', '!=', $user_id)
            ->where('messages.user_id', '!=', $user_id)
            ->groupBy('threads.requirement_id')
            ->where('mn.is_seen', 0)
            ->get();


        $total_unread = $data->sum('msg_count');
        $post_wise_unread = $data->toArray();

        $res = ['total_unread' => $total_unread, 'post_wise_unread' => $post_wise_unread];

        return response()->json($res);
    }

    public function messageSeen($mThread)
    {
        $user_id = session('user_id');

        $auth_user_rec = Participant::where('thread_id', $mThread)
            ->where('user_id', $user_id)->first();

        $auth_user_rec->update(['last_read' =>  Carbon::now()->toDateTimeString()]);

        $setMessageSeen = Participant::join('messages', 'messages.user_id', '=', 'participants.user_id')
            ->join('message_notifications', 'message_notifications.message_id', '=', 'messages.id')
            ->where('participants.thread_id', $mThread)
            ->where('message_notifications.notify_user_id', $user_id)
            ->update(['is_seen' =>  1]);
    }

    public function coinUtilized($other_user_id, $mThread)
    {
        $user_id = session('user_id');

        $messages_user_1 = Message::where('thread_id', $mThread)->where('user_id', $user_id)->get()->count();
        $messages_user_2 = Message::where('thread_id', $mThread)->where('user_id', $other_user_id)->get()->count();
        $participants = Participant::where('thread_id', $mThread)->get()->pluck('user_id')->toArray();

        if ($messages_user_1 > 0 && $messages_user_2 > 0) {
            CoinUsed::join('coin_used_items as cui', 'cui.coin_used_id', '=', 'coin_used.id')
                ->where('user_id', $participants[0])
                ->where('used_against_id', $participants[1])
                ->where('thread_id', $mThread)
                ->update([
                    'coin_utilize_status' => 1
                ]);
        }
    }
}
