<?php

namespace App\Providers;

use App\User;
use App\Common;
use App\Review;
use App\Thread;
use App\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (!session('apidata')) {
                $apiurl = "https://geolocation-db.com/jsonp/";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiurl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $apidata = curl_exec($ch);
                curl_close($ch);
                $apidata = substr($apidata, 9, -1);
                $apidata = json_decode($apidata, true);
                session()->put('apidata', $apidata);
            }
            // refund

            $unUsedCoin = User::role('teacher')
                ->join('coin_used as cu', 'cu.user_id', '=', 'users.id')
                ->join('coin_used_items as cui', 'cui.coin_used_id', '=', 'cu.id')
                ->where('cui.coin_utilize_status', 0)
                ->where('cu.deleted_at', null)
                ->whereDate('cu.created_at', '<=', now()->subDays(14)->setTime(0, 0, 0)->toDateTimeString())
                ->get();
            if (count($unUsedCoin) > 0) {
                foreach ($unUsedCoin as $key => $value) {
                    $check = User::where('id', $value->used_against_id)
                        ->with('verifications')
                        ->whereHas('verifications', function ($query) {
                            $query->where('phone_verified', "0");
                        })
                        ->first()
                        ->toArray();

                    if ($check) {
                        Common::Wallet($value->no_of_used_coins, 'add-coin', $value->user_id);
                        Common::Wallet_Log($value->no_of_used_coins, 'Coin Refunded Against',  $value->coin_used_id, $value->user_id);
                        User::role('teacher')
                            ->join('coin_used as cu', 'cu.user_id', '=', 'users.id')
                            ->join('coin_used_items as cui', 'cui.coin_used_id', '=', 'cu.id')
                            ->where('cu.id', $value->coin_used_id)
                            ->where('cui.coin_used_id', $value->coin_used_id)
                            ->update(['cu.deleted_at' => now(), 'cui.deleted_at' => now()]);
                        Participant::where('thread_id', $value->thread_id)->delete();
                        Thread::where('id', $value->thread_id)->delete();
                    }
                }
            }
            // end refund
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $check_user_account_verified = NULL;
                if ($user_id) {
                    $check_user_account_verified = User::where('users.id', $user_id)
                        ->leftJoin('user_verifications as uv', 'uv.user_id', '=', 'users.id')
                        ->first();
                }
                $v_review_report = Review::where('status', '1')->count();
                $view->with(['is_verified' => $check_user_account_verified, 'v_review_report' => $v_review_report]);
            }
        });
    }
}
