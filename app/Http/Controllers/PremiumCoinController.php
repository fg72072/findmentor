<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PremiumCoinController extends Controller
{
    public function index()
    {
        return view('teacher.go-premium');
    }

    public function findRank(Request $request)
    {
        $user_id = session('user_id');
        $myRank = 0;

        $premiunMembers = User::role('teacher')
            ->join('memberships as ms', 'ms.member_id', '=', 'users.id')
            ->join('wallet as w', 'w.user_id', '=', 'ms.member_id')
            ->orderBy('w.coins', 'desc')
            ->get();

        foreach ($premiunMembers as $rank => $member) {
            if ($member->member_id == $user_id) {
                $myRank = (int)$myRank + $rank + 1;
            }
        }

        $res = [
            'myRank' => $myRank
        ];

        return response()->json($res);
    }
}
