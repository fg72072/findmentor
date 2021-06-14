<?php

namespace App\Http\Controllers;

use App\User;
use App\Common;
use App\Thread;
use App\Wallet;
use App\CoinUsed;
use App\CoinUsedItem;
use App\Participant;
use App\RequestTutor;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserHireController extends Controller
{
    public function contactUser(Request $request)
    {

        $user_id = session('user_id');
        $user_role = Auth::user()->roles->pluck('name')[0];

        $user_coins = Wallet::where('user_id', $user_id)->first()->coins;

        $check_coin_used_against_user = CoinUsed::where('user_id', $user_id)
            ->join('coin_used_items as cui', 'cui.coin_used_id', '=', 'coin_used.id')
            ->join('request_tutors as rt', 'rt.id', '=', 'cui.requirement_id')
            ->where('rt.is_closed', 0)
            ->where('used_against_id', $request->other_user_id)
            ->first();


        if ($user_role == 'student') {
            if ($check_coin_used_against_user) {
                $res = [
                    'message' => 'go-to-message'
                ];
            } else if (!$check_coin_used_against_user && $user_coins >= 50) {
                $res = [
                    'message' => 'deduct-coins'
                ];
            } else if ($user_coins < 50) {
                $res = [
                    'message' => 'buy-coin',
                    'coins' => $user_coins
                ];
            }
        }

        return response()->json($res);
    }
    public function userPhone(Request $request)
    {
        $user_id = session('user_id');
        $user_role = Auth::user()->roles->pluck('name')[0];

        $user_coins = Wallet::where('user_id', $user_id)->first()->coins;

        $check_coin_used_against_user = CoinUsed::where('user_id', $user_id)
            ->where('used_against_id', $request->other_user_id)
            ->first();

        $check_user_phone_verified = User::leftJoin('user_verifications as uv', 'uv.user_id', '=', 'users.id')
            ->where('users.id', $request->other_user_id)
            ->first();

        $user_phone_is_verified = $check_user_phone_verified->phone_verified;
        $user_phone = $check_user_phone_verified->phone;


        if ($user_role == 'student') {
            if ($user_phone_is_verified == 0) {
                $res = [
                    'message' => 'phone-not-verified'
                ];
            } else if ($check_coin_used_against_user) {
                $res = [
                    'message' => 'show-number',
                    'phone' => $user_phone
                ];
            } else if (!$check_coin_used_against_user && $user_coins >= 50) {
                $res = [
                    'message' => 'deduct-coins'
                ];
            } else if ($user_coins < 50) {
                $res = [
                    'message' => 'buy-coin',
                    'coins' => $user_coins
                ];
            }
        }
        return response()->json($res);
    }

    public function userPayment(Request $request)
    {
        $user_id = session('user_id');
        $user_role = Auth::user()->roles->pluck('name')[0];

        $check_user_payment_verified = User::leftJoin('user_verifications as uv', 'uv.user_id', '=', 'users.id')
            ->where('users.id', $request->other_user_id)
            ->first();

        $user_payment_is_verified = $check_user_payment_verified->payment_verified;

        if ($user_role == 'student') {
            if ($user_payment_is_verified == 0) {
                $res = [
                    'message' => 'payment-not-verified'
                ];
            }
        }
        return response()->json($res);
    }

    public function userReview(Request $request)
    {
        $user_id = session('user_id');
        $user_role = Auth::user()->roles->pluck('name')[0];

        $check_coin_used_against_user = CoinUsed::where('user_id', $user_id)
            ->where('used_against_id', $request->other_user_id)
            ->first();

        if ($user_role == 'student') {
            if ($check_coin_used_against_user) {
                $res = [
                    'message' => 'show-review-box'
                ];
            } else if (!$check_coin_used_against_user) {
                $res = [
                    'message' => 'dont-show-review-box'
                ];
            }
        }

        return response()->json($res);
    }

    public function create(Request $request, $id)
    {
        $user_id = session('user_id');
        $other_user_id = $id;
        $requirement_id = $request->requirement_id;
        $name = '';

        if (empty($requirement_id)) {

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $name = $this->getFileName($image);
                $path = $this->getProfilePicPath();
                $image->move($path, $name);
            }

            $requirement_id = RequestTutor::Create([
                'student_id' => $user_id,
                'location' => $request->location,
                'phone' => $request->phone,
                'detail' => $request->detail,
                'subject' => $request->subject,
                'grade_level' => $request->grade,
                'help_type' => $request->guide_type,
                'online_class' => $request->online_class,
                'class_at_student_place' => $request->class_at_student_place,
                'class_at_tutor_place' => $request->class_at_tutor_place,
                'budget' => $request->budget,
                'gender_preference' => $request->gender_preference,
                'no_of_tutor' => $request->no_of_tutor,
                'working_type' => $request->working_type,
                'file' => $name
            ])->id;
        }

        $this->coinUsedAgainst(50, $requirement_id, $other_user_id);
        $thread_id = $this->createThread($requirement_id, $other_user_id);

        return redirect('view-messages?mThread=' . $thread_id);
    }


    public function coinUsedAgainst($no_of_coins_use, $requirement_id, $other_user_id)
    {
        $user_id = session('user_id');
        $subjects = RequestTutor::find($requirement_id)->first()->subject;

        $coin_used_id = CoinUsed::Create([
            'user_id' => $user_id,
            'used_against_id' => $other_user_id,

        ])->id;

        CoinUsedItem::Create([
            'coin_used_id' => $coin_used_id,
            'requirement_id' => $requirement_id,
            'no_of_used_coins' => $no_of_coins_use,
            'subject' => $subjects
        ]);

        Common::Wallet($no_of_coins_use, 'subtract-coin');
        Common::Wallet_Log($no_of_coins_use, 'Coin Used Against', $coin_used_id);
    }

    public function createThread($requirement_id, $other_user_id)
    {
        $user_id = session('user_id');

        $thread_id = Thread::Create([
            'requirement_id' => $requirement_id
        ])->id;

        $this->createParticipant($thread_id, $user_id);
        $this->createParticipant($thread_id, $other_user_id);

        return $thread_id;
    }

    public function createParticipant($thread_id, $user_id)
    {
        Participant::Create([
            'thread_id' => $thread_id,
            'user_id' => $user_id,
            'last_read' =>  Carbon::now()->toDateTimeString()
        ]);
    }

    private function getFileName($image)
    {
        return time() . '.' . str_replace(' ', '_', strtolower($image->getClientOriginalName()));
    }

    private function getProfilePicPath()
    {
        return public_path() . "/asset/document/request";
    }

    public function reviewCreate(Request $request)
    {
        $user_id = session('user_id');

        Review::updateOrCreate([
            'user_id' => $user_id,
            'review_to_user_id' =>  $request->other_user_id
        ], [
            'user_id' => $user_id,
            'review_to_user_id' =>  $request->other_user_id,
            'rating' =>  $request->rating,
            'headline' =>  $request->reviewHeading,
            'review' =>  $request->userReview,
        ]);

        Session::flash('success', 'Review');
        return redirect()->back();
    }
}
