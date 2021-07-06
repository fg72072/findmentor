<?php

namespace App\Providers;

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
                $view->with('is_verified', $check_user_account_verified);
            }
        });
    }
}
