<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear-cache', function () {
    $text = "Start...";
    Artisan::call('cache:clear');
    $text = $text . Artisan::output();
    Artisan::call('route:clear');
    $text = $text . Artisan::output();
    Artisan::call('config:clear');
    $text = $text . Artisan::output();
    Artisan::call('view:clear');
    $text = $text . Artisan::output();
    return $text;
});

Route::get('/phpinfo', function () {
    echo phpinfo();
});

Auth::routes(['verify' => true]);

// Default Home Route
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/refer/{reference_id}', [
    'uses' => 'HomeController@referenceRegister',
    'as' => 'home.reference'
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

//Error Page Route
Route::get('/error', function () {
    return view('error-message');
})->name('error');

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
    ])->middleware(['permission:Create', 'user_account_verification']);

    // Add Tutor Description
    Route::post('/description/create', [
        'uses' => 'TutorProfileController@createDescription',
        'as' => 'description_create'
    ])->middleware(['permission:Create', 'user_account_verification']);

    // Add Tutor Description
    Route::get('/go-premium', [
        'uses' => 'PremiumCoinController@index',
        'as' => 'go_premium'
    ])->middleware(['permission:Create', 'user_account_verification']);

    // Buy Premium Coins
    Route::post('/premium-billing', [
        'uses' => 'CoinController@premiumCoinBilling',
        'as' => 'premium.billing'
    ])->middleware(['permission:Create', 'user_account_verification']);
});

// Middleware For Student Route
Route::group(['middleware' => ['role:student', 'auth', 'user_account_verification']], function () {

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
Route::group(['middleware' => ['role:student|teacher', 'user_account_verification']], function () {

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

    Route::get('/change-name', [
        'uses' => 'SettingController@username',
        'as' => 'username'
    ])->middleware(['permission:Edit']);
    Route::post('/name/change', [
        'uses' => 'SettingController@changeName',
        'as' => 'changeName'
    ])->middleware(['permission:Edit']);

    Route::get('/change-email', [
        'uses' => 'SettingController@email',
        'as' => 'email'
    ])->middleware(['permission:Edit']);
    Route::post('/name/email', [
        'uses' => 'SettingController@changeEmail',
        'as' => 'changeEmail'
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

    // Refer & Earn
    Route::get('/refer-and-earn', [
        'uses' => 'ReferController@index',
        'as' => 'refer_and_earn'
    ]);

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
    Route::post('/admin/profile/upload', [
        'uses' => 'Admin\SettingController@upload',
        'as' => 'admin.profile.upload'
    ])->middleware(['permission:Create']);

    // Admin Reviews Route
    Route::get('/admin/user/reviews/{id}', [
        'uses' => 'Admin\ReviewController@index',
        'as' => 'admin.user.reviews'
    ]);

    // Admin Reviews Delete Route
    Route::get('/admin/user/review/trash/{id}', [
        'uses' => 'Admin\ReviewController@destroy',
        'as' => 'admin.user.review.trash'
    ]);

    // Admin User Chat list Route
    Route::get('/admin/user/chat/{id}', [
        'uses' => 'Admin\ChatController@index',
        'as' => 'admin.user.chat'
    ]);

    // Admin User Messages
    Route::get('/admin/user/messages', [
        'uses' => 'Admin\ChatController@viewMessage',
        'as' => 'admin.user.messages'
    ]);

    // Admin Blog
    Route::get('/admin/blog', [
        'uses' => 'Admin\BlogController@index',
        'as' => 'admin.blog'
    ]);
    // Admin Blog Create
    Route::get('/admin/blog/create', [
        'uses' => 'Admin\BlogController@create',
        'as' => 'admin.blog.create'
    ]);
    // Admin Blog Store
    Route::post('/admin/blog/store', [
        'uses' => 'Admin\BlogController@store',
        'as' => 'admin.blog.store'
    ]);
    // Admin Blog Edit
    Route::get('/admin/blog/edit/{id}', [
        'uses' => 'Admin\BlogController@edit',
        'as' => 'admin.blog.edit'
    ]);
    // Admin Blog Update
    Route::post('/admin/blog/update/{id}', [
        'uses' => 'Admin\BlogController@update',
        'as' => 'admin.blog.update'
    ]);
    // Admin Blog Trash
    Route::get('/admin/blog/destroy/{id}', [
        'uses' => 'Admin\BlogController@destroy',
        'as' => 'admin.blog.delete'
    ]);
});
Route::get('/about-us', 'StaticPagesController@aboutUs')->name('about');
Route::get('/stay-safe', 'StaticPagesController@staySafe')->name('stay_safe');
Route::get('/blog', 'StaticPagesController@blog')->name('blogs');
Route::get('/blog/{title}', 'StaticPagesController@blog')->name('single.blog');
Route::get('/refer-and-earn-coins', 'StaticPagesController@referAndEarnCoin')->name('refer');
Route::get('/faq', 'StaticPagesController@faq')->name('faq');
Route::get('/coins', 'StaticPagesController@coins')->name('coins');
Route::get('/how-it-works-students', 'StaticPagesController@howItWorkStudent')->name('how_it_works_student');
Route::get('/pay-teachers', 'StaticPagesController@payTeacher')->name('pay_teachers');

Route::get('/feedback', 'StaticPagesController@feedback')->name('feedback');
Route::get('/testimonials', 'StaticPagesController@testimonials')->name('testimonials');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');
Route::get('/refund-policy', 'StaticPagesController@refundPolicy')->name('refund_policy');
Route::get('/privacy-policy', 'StaticPagesController@privacyPolicy')->name('privacy_policy');
Route::get('/terms-and-conditions', 'StaticPagesController@termsAndConditions')->name('terms_and_conditions');

Route::get('/get-paid', 'StaticPagesController@getPaid')->name('get_paid');
Route::get('/premium-membership-for-tutors', 'StaticPagesController@premiumMembershipForTutors')->name('premium_membership');
Route::get('/how-it-works-teachers', 'StaticPagesController@howItWorksTeachers')->name('how_it_works_teachers');
Route::get('/how-to-apply-to-a-job-and-contact-students', 'StaticPagesController@ApplyAndContactStudents')->name('apply_and_contact_students');
Route::get('/share-stories', 'StaticPagesController@shareStories')->name('share_stories');
// Route::get('/online-teaching-guide', 'StaticPagesController@feedback')->name('feedback');
// Route::get('/how-we-rank-teachers-on-teacheron', 'StaticPagesController@feedback')->name('feedback');
// Route::get('/how-to-get-students-and-teaching-jobs', 'StaticPagesController@feedback')->name('feedback');


Route::fallback(function () {
    Session::flash('error', 'Page Not Found');
    return redirect()->route('home');
});
