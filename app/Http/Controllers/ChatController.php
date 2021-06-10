<?php

namespace App\Http\Controllers;

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
    public function jobChatList()
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
                'threads.created_at'
            )
            ->where('user_id', '!=', $user_id)
            ->get();

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


        session([
            'mThread' => $request->mThread,
            'other_user_id' => $message_info->user_id,
            'requirement_id' => $message_info->post_id
        ]);

        $this->messageSeen();

        return view('chat')->with('user_id', $user_id)->with('message_info', $message_info);
    }


    public function getMessages()
    {
        $mThread = session('mThread');
        $user_id = session('user_id');

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
                $html .= '<h2 class=" pt-3">' .
                    $item->username . ',
                <span class="pl-5" style="font-size: 10px;padding-left: 0px !important;">' .
                    Common::changeDate($item->created_at)
                    . '</span>
            </h2>
            <p class="pt-3">
                ' . $item->body . '
            </p>';
            } else {
                $html .= '<h2 class="pt-3 text-right">
                <span class="pl-5" style="font-size: 10px;padding-left: 0px !important;">' .
                    Common::changeDate($item->created_at)
                    . '</span>
            </h2>
            <p class="pt-3 text-right">
            ' . $item->body . '
            </p>';
            }
        }

        echo $html;
    }

    public function sendMessage(Request $request)
    {

        $user_id = session('user_id');
        $other_user_id = session('other_user_id');
        $requirement_id = session('requirement_id');

        $message = $request->message;

        $check_auth_user = Thread::join('participants', 'participants.thread_id', '=', 'threads.id')
            ->select('threads.id as thread_id')
            ->where('threads.requirement_id', $requirement_id)
            ->where('participants.user_id', $user_id)->first();

        $check_other_user = Thread::join('participants', 'participants.thread_id', '=', 'threads.id')
            ->where('threads.requirement_id', $requirement_id)
            ->where('participants.user_id', $other_user_id)->first();


        if ($check_auth_user && $check_other_user) {
            $thread_id = $check_auth_user->thread_id;
        }

        if (!($check_auth_user && $check_other_user)) {

            $thread_id = Thread::Create([
                'requirement_id' => $requirement_id
            ])->id;

            $this->createParticipant($thread_id, $user_id);
            $this->createParticipant($thread_id, $other_user_id);
        }


        $message_id = $this->createMessage($thread_id, $message);

        $this->createNotification($message_id, $other_user_id);
    }

    public function createParticipant($thread_id, $user_id)
    {
        Participant::Create([
            'thread_id' => $thread_id,
            'user_id' => $user_id,
            'last_read' =>  Carbon::now()->toDateTimeString()
        ]);
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

    public function messageSeen()
    {
        $user_id = session('user_id');
        $mThread = session('mThread');

        $auth_user_rec = Participant::where('thread_id', $mThread)
            ->where('user_id', $user_id)->first();

        $auth_user_rec->update(['last_read' =>  Carbon::now()->toDateTimeString()]);


        $setMessageSeen = Participant::join('messages', 'messages.user_id', '=', 'participants.user_id')
            ->join('message_notifications', 'message_notifications.message_id', '=', 'messages.id')
            ->where('participants.thread_id', $mThread)
            ->where('message_notifications.notify_user_id', $user_id)
            ->update(['is_seen' =>  1]);
    }
}
