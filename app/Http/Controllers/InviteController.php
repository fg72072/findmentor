<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class InviteController extends Controller
{
    public function index()
    {
        return view('invite-friend');
    }

    public function sendInvitation(Request $request)
    {
        $emails = array_unique(array_filter(preg_split('/\r\n|\n|\r|\s/', $request->friendsEmail)));

        if (count($emails) > 0) {
            foreach ($emails as $key => $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->sendMail($email);
                }
            }
        }

        Session::flash('success', 'Invite sent');
        return view('invite-friend');
    }


    static function sendMail($email)
    {
        $content = 'This is Invitation Email From FindMentor';
        $data = [
            'subject' => 'FindMentor Invitation',
            'name' => 'FindMentor',
            'email' => $email,
            'content' => $content
        ];

        Mail::send('static pages.email-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });
    }
}
