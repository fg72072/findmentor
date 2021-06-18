<?php

namespace App\Http\Middleware;

use App\Common;
use Closure;

class UserAccountVerificationRedirection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $USER = Common::CheckUserAccountAccess();
        if ($USER->active_status == 0) {
            session(['error_message' => 'Your Account has been blocked']);
            return redirect()->route('error');
            echo 'user has been blocked';
        }
        if (!$USER->email_verified_at) {
            session(['error_message' => 'Email Verification Required']);
            return redirect()->route('error');
            echo 'email verification required';
        }
        if (!$USER->is_account_verified_at && $USER->is_verification_detail_complete == 1) {
            session(['error_message' => 'Your Account Under Verification Process']);
            return redirect()->route('error');
            echo 'account verification required';
        }
        if (!$USER->is_account_verified_at && $USER->is_verification_detail_complete == 0) {
            return redirect()->route('account');
        }
        return $next($request);
    }
}
