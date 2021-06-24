<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Thread;
use App\Message;
use App\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function index($id)
    {
        $user_id = $id;

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
            )
            ->where('user_id', '!=', $user_id)
            ->get();

        foreach ($data as $key => $value) {

            $getLastMsg = Message::where('thread_id', $value->thread_id)->orderBy('created_at', 'desc')->first();

            if ($getLastMsg) {
                $value->last_message = $getLastMsg->body;
            }
        }

        return view('admin.chat')->with('data', $data)->with('user_id', $user_id);
    }



    public function viewMessage(Request $request)
    {
        $user_id = $request->user_id;
        $mThread = $request->mThread;

        $validate = Thread::join('participants', 'participants.thread_id', '=', 'threads.id')
            ->where('threads.id', $request->mThread)
            ->where('participants.user_id', $user_id)->first();

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

        $messages = Message::where('thread_id', $mThread)
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->select(
                'messages.*',
                'users.name as username'
            )
            ->get();

        return view('admin.messages')->with('user_id', $user_id)->with('messages', $messages)->with('message_info', $message_info);
    }
}
