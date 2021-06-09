<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// Default Home Route
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);
Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

// Find Tutor Job
Route::get('/tutor-jobs', [
    'uses' => 'TutorJobController@find',
    'as' => 'tutor_job'
]);
Route::get('/tutor-job/{id}', [
    'uses' => 'TutorJobController@show',
    'as' => 'show_tutor_job'
]);

// Find Tutor
Route::get('/find-tutor', [
    'uses' => 'FindTutorController@search',
    'as' => 'findtutor'
]);

// Tutor Profile
Route::get('/tutor-profile/{id}', [
    'uses' => 'TutorProfileController@profile',
    'as' => 'tutor_profile'
]);

// Middleware For Teacher Route
Route::group(['middleware' => ['role:teacher']], function () {

    // Account
    Route::get('/account-verify', [
        'uses' => 'TeacherAccountVerificationController@index',
        'as' => 'account'
    ]);
    Route::post('/account-verify/create', [
        'uses' => 'TeacherAccountVerificationController@store',
        'as' => 'account.create'
    ])->middleware(['permission:Create']);
});

// Middleware For Student Route
Route::group(['middleware' => ['role:student']], function () {

    // Request a Tutor
    Route::get('/request', [
        'uses' => 'RequestTutorController@index',
        'as' => 'student.request'
    ]);
    Route::post('/request/create', [
        'uses' => 'RequestTutorController@store',
        'as' => 'request.create'
    ])->middleware(['permission:Create']);
    Route::get('/request/closed/{id}', [
        'uses' => 'RequestTutorController@postClosed',
        'as' => 'request.closed'
    ])->middleware(['permission:Edit']);
    Route::get('/request/repost/{id}', [
        'uses' => 'RequestTutorController@rePost',
        'as' => 'request.repost'
    ])->middleware(['permission:Edit']);

    // My Requirements
    Route::get('/requirement', [
        'uses' => 'RequirementController@index',
        'as' => 'student.requirement'
    ]);
});

// Middleware For Student & Teacher Route
Route::group(['middleware' => ['role:student|teacher']], function () {

    // Dashboard
    Route::get('/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);

    // Profile
    Route::get('/profile', [
        'uses' => 'SettingController@profile',
        'as' => 'profile'
    ]);
    Route::post('/account/upload', [
        'uses' => 'SettingController@upload',
        'as' => 'profile.upload'
    ])->middleware(['permission:Create']);

    // Phone Verified
    Route::get('/phone', [
        'uses' => 'SettingController@phone',
        'as' => 'phone'
    ]);
    Route::post('/phone-verified', [
        'uses' => 'SettingController@phoneVerified',
        'as' => 'changePhone'
    ])->middleware(['permission:Edit']);

    // Settings
    Route::get('/setting', [
        'uses' => 'SettingController@index',
        'as' => 'setting'
    ]);

    // Buy Coin
    Route::get('/buy-coin', [
        'uses' => 'CoinController@index',
        'as' => 'buyCoin'
    ]);
    Route::post('/billing', [
        'uses' => 'CoinController@billing',
        'as' => 'billing'
    ]);
    Route::post('/buy-coin/payment', [
        'uses' => 'CoinController@coin_payment',
        'as' => 'buy_coin.payment'
    ]);


    // Chat
    Route::get('/chat', [
        'uses' => 'ChatController@index',
        'as' => 'chat'
    ]);
    // Message List
    Route::get('/messages', [
        'uses' => 'ChatController@chatList',
        'as' => 'chat'
    ]);
});

Route::fallback(function () {
    Session::flash('error', 'Page Not Found');
    return redirect('/');
});
