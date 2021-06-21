<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class Common extends Model
{
    // Account Verification param [ column_name => 0|1 ] for verified 1
    public static function UserAccountVerification($param = NULL)
    {
        $user_id = session('user_id');

        if ($param == NULL) {
            $param = ['user_id' =>  $user_id];
        }
        return  UserVerification::updateOrCreate(['user_id' =>  $user_id], $param);
    }

    public static function Wallet($coin = 0, $action = 'no action', $user_id = 0)
    {
        if ($user_id != 0) {
            $user_id = $user_id;
        } else {
            $user_id = session('user_id');
        }

        $data = Wallet::where('user_id', $user_id)->first();
        $total_coin = 0;

        if (!$data) {
            return Wallet::updateOrCreate(['user_id' =>  $user_id], ['user_id' =>  $user_id, 'coins' => $coin]);
        }

        $total_coin = $data->coins;

        switch ($action) {
            case 'add-coin':
                $total_coin += $coin;
                break;
            case 'subtract-coin':
                $total_coin -= $coin;
                break;
            default:
        }

        return Wallet::updateOrCreate(['user_id' =>  $user_id], ['user_id' => $user_id, 'coins' => $total_coin]);
    }

    public static function Wallet_Log($coin = 0, $description = '', $coin_used_id = 0, $user_id = 0)
    {

        if ($user_id != 0) {
            $user_id = $user_id;
        } else {
            $user_id = session('user_id');
        }

        return WalletLog::Create([
            'user_id' =>  $user_id,
            'coin_used_id' => $coin_used_id,
            'coin' => $coin,
            'description' => $description
        ]);
    }

    public static function changeDate($date)
    {
        return Carbon::createFromFormat("Y-m-d H:i:s", $date)->diffForHumans();
    }


    public static function CheckUserAccountAccess()
    {
        $user_id = session('user_id');

        return User::join('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->first();
    }
}
