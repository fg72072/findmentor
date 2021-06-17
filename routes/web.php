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
Route::group(['middleware' => ['role:teacher', 'auth', 'verified']], function () {
    // Account
    Route::get('/account-verify', [
        'uses' => 'TeacherAccountVerificationController@index',
        'as' => 'account'
    ]);
    Route::post('/account-verify/create', [
        'uses' => 'TeacherAccountVerificationController@store',
        'as' => 'account.create'
    ])->middleware(['permission:Create']);

    // Create Requirement After Pay Student
    Route::post('/requirement/create', [
        'uses' => 'UserHireController@createCoinUsedTeacherToStudent',
        'as' => 'requirement_create_teacher_to_student'
    ])->middleware(['permission:Create']);

    // Add Tutor Description
    Route::post('/description/create', [
        'uses' => 'TutorProfileController@createDescription',
        'as' => 'description_create'
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

    // Contact Student To Teacher Ajax Request
    Route::post('/contact-teacher-to-discuss-requirement', [
        'uses' => 'UserHireController@contactStudentToTeacher',
        'as' => 'contact_user'
    ]);
    // Contact Teacher To Student Ajax Request
    Route::post('/contact-student-to-discuss-requirement', [
        'uses' => 'UserHireController@contactTeacherToStudent',
        'as' => 'contact_teacher_to_student'
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

// Admin Routes
Route::group(['middleware' => ['role:super-admin']], function () {

    // Admin Dashboard Route
    Route::get('/admin/dashboard', [
        'uses' => 'Admin\AdminDasboardController@index',
        'as' => 'admin_dashboard'
    ]);

    // Admin Teacher Account Verify View Route
    Route::get('/admin/account-verify', [
        'uses' => 'Admin\AccountVerifyController@index',
        'as' => 'admin_account_verify'
    ]);

    // Admin Teacher Detail Route
    Route::get('/admin/teacher-detail/{id}', [
        'uses' => 'Admin\AccountVerifyController@show',
        'as' => 'admin_user_detail'
    ]);

    // Admin Teacher Approval Route
    Route::get('/admin/user-account-approve/{id}', [
        'uses' => 'Admin\AccountVerifyController@approveAccount',
        'as' => 'admin_user_approve'
    ]);

    //  Admin Teacher Reject Route
    Route::get('/admin/user-account-reject/{id}', [
        'uses' => 'Admin\AccountVerifyController@rejectAccount',
        'as' => 'admin_user_reject'
    ]);

    //  Admin Teacher Reject Route
    Route::get('/admin/user-account-activate/{id}', [
        'uses' => 'Admin\AccountVerifyController@accountActivate',
        'as' => 'admin_user_activate'
    ]);

    // Admin All Users Route
    Route::get('/admin/users', [
        'uses' => 'Admin\UserController@index',
        'as' => 'admin_users'
    ]);

    // Admin Student Requests Route
    Route::get('/admin/student/requests', [
        'uses' => 'Admin\RequestTutorController@index',
        'as' => 'admin_request'
    ]);

    // Admin Coins Route
    Route::get('/admin/coins', [
        'uses' => 'Admin\CoinController@index',
        'as' => 'admin_coins'
    ]);

    // Admin Coins Route
    Route::post('/admin/coins/add', [
        'uses' => 'Admin\CoinController@store',
        'as' => 'admin_add_edit_coins'
    ]);

    // Admin Coins Route
    Route::get('/admin/coins/delete/{id}', [
        'uses' => 'Admin\CoinController@destroy',
        'as' => 'admin_delete_coins'
    ]);

    // Admin Setting Route
    Route::get('/admin/setting', [
        'uses' => 'Admin\SettingController@index',
        'as' => 'admin_setting'
    ]);

    // Admin Setting change password Route
    Route::post('/admin/change-password', [
        'uses' => 'Admin\SettingController@updatePassword',
        'as' => 'admin_change_password'
    ]);

    // Admin Setting change username Route
    Route::post('/admin/change-username', [
        'uses' => 'Admin\SettingController@updateUsername',
        'as' => 'admin_change_username'
    ]);
});


Route::fallback(function () {
    Session::flash('error', 'Page Not Found');
    return redirect('/');
});
