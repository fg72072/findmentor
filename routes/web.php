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

    // Create Requirement After Pay Tutor
    Route::post('/requirement/create/{id}', [
        'uses' => 'UserHireController@create',
        'as' => 'requirement.create'
    ])->middleware(['permission:Create']);
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

    // Review
    Route::get('/review', [
        'uses' => 'ReviewController@index',
        'as' => 'review'
    ]);

    // // Message List
    // Route::get('/job-messages', [
    //     'uses' => 'ChatController@jobChatList',
    //     'as' => 'chat'
    // ]);
    // Chat list
    Route::get('/job-messages', [
        'uses' => 'ChatController@jobChatList',
        'as' => 'job_messages'
    ]);
    // Messages
    Route::get('/view-messages', [
        'uses' => 'ChatController@viewMessage',
        'as' => 'view_messages'
    ]);
    // Send Message Request Ajax Request
    Route::post('/send-messages', [
        'uses' => 'ChatController@sendMessage',
        'as' => 'send_message'
    ]);
    // Get Message Request Ajax Request
    Route::get('/get-messages/{id}', [
        'uses' => 'ChatController@getMessages',
        'as' => 'get_messages'
    ]);
    // Get Message Notification Ajax Request
    Route::get('/notification', [
        'uses' => 'ChatController@getNotifications',
        'as' => 'notification'
    ]);

    // Contact User Ajax Request
    Route::post('/contact-to-discuss-requirement', [
        'uses' => 'UserHireController@contactUser',
        'as' => 'contact_user'
    ]);
    // Get User Phone Ajax Request
    Route::post('/user-phone', [
        'uses' => 'UserHireController@userPhone',
        'as' => 'user_phone'
    ]);
    // Get User Payment Detail Ajax Request
    Route::post('/user-payment', [
        'uses' => 'UserHireController@userPayment',
        'as' => 'user_payment'
    ]);
    // Check User Review Ajax Request
    Route::post('/user-review', [
        'uses' => 'UserHireController@userReview',
        'as' => 'user_review'
    ]);
    // Check User Review Ajax Request
    Route::post('/review/create', [
        'uses' => 'UserHireController@reviewCreate',
        'as' => 'review_create'
    ]);
});

Route::fallback(function () {
    Session::flash('error', 'Page Not Found');
    return redirect('/');
});
