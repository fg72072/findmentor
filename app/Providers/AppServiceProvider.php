<?php

namespace App\Providers;

use App\Review;
use App\User;
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
