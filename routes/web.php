<?php

use Illuminate\Support\Facades\Route;

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






Route::get('/', [\App\Http\Controllers\FrontendController::class,'index'])->name('front');
Route::get('/referral-join/{refid}', [\App\Http\Controllers\VisitorController::class,'referral_join'])->name('referralurl');

//verify account
Route::get('/verify-account/{code}', [\App\Http\Controllers\VisitorController::class,'verify_account'])->name('verify.account');

//forgot password
Route::get('/forgot-password', [\App\Http\Controllers\VisitorController::class,'forgot_password'])->name('user.forgot.password');
Route::post('/reset-pass-send-link', [\App\Http\Controllers\VisitorController::class,'reset_pass_send_link'])->name('user.reset.pass.send.link');
Route::get('/password-change/{code}', [\App\Http\Controllers\VisitorController::class,'reset_pass_verify'])->name('user.reset.pass.verify');
Route::post('/change-password-change-save', [\App\Http\Controllers\VisitorController::class,'reset_pass_chnage_save'])->name('user.reset.pass.change.save');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


//user register
Route::post('/register', [\App\Http\Controllers\Auth\CustomLoginController::class,'custom_register'])->name('user.custom.register');
Route::post('/login', [\App\Http\Controllers\Auth\CustomLoginController::class,'custom_login'])->name('user.login');

Route::group(['middleware' => ['auth:sanctum','uverify']], function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [\App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

        //referral user
        Route::get('/referral-user', [\App\Http\Controllers\User\UserController::class,'referral_user'])->name('user.referral.user');
        //profile
        Route::get('/profile', [\App\Http\Controllers\User\UserController::class,'profile'])->name('user.edit.profile');
        Route::post('/profile-update', [\App\Http\Controllers\User\UserController::class,'profile_update'])->name('user.profile.update');

        //change password
        Route::get('/change-password', [\App\Http\Controllers\User\UserController::class,'change_password'])->name('user.change.password');
        Route::post('/change-password-update-save', [\App\Http\Controllers\User\UserController::class,'change_password_save'])->name('user.change.password.submit');

        //user account verify
        Route::get('/account-verify', [\App\Http\Controllers\User\UserController::class,'account_verify'])->name('user.account.verify');
        Route::post('/account-verify-submit', [\App\Http\Controllers\User\UserController::class,'account_verify_submit'])->name('user.pin.active.submit');

        //create post
        Route::get('/create-post', [\App\Http\Controllers\User\UserPostController::class,'create_post'])->name('user.create.post');
        Route::post('/create-post-save', [\App\Http\Controllers\User\UserPostController::class,'create_post_save'])->name('user.post.save');
        Route::get('/post-details/{id}', [\App\Http\Controllers\User\UserPostController::class,'post_details'])->name('user.post.details');
        Route::post('/post-comment-save', [\App\Http\Controllers\User\UserPostController::class,'post_comment_save'])->name('user.post.comment.save');

        //post like
        Route::get('/post-like-save/{id}', [\App\Http\Controllers\User\UserPostController::class,'post_like_save'])->name('user.post.like.save');

        //mobile recharge
        Route::get('/mobile-recharge', [\App\Http\Controllers\User\UserTransactionController::class,'mobile_recharge'])->name('user.mobile.recharge');
        Route::post('/mobile-recharge-save', [\App\Http\Controllers\User\UserTransactionController::class,'mobile_recharge_save'])->name('user.mobile.recharge.save');

        //withdraw money
        Route::get('/withdraw-money', [\App\Http\Controllers\User\UserTransactionController::class,'withdraw_money'])->name('user.withdraw.money');
        Route::post('/withdraw-money-save', [\App\Http\Controllers\User\UserTransactionController::class,'withdraw_money_save'])->name('user.withdraw.money.save');

        //transfer money
        Route::get('/transfer-money', [\App\Http\Controllers\User\UserTransactionController::class,'transfer_money'])->name('user.transfer.money');
        Route::post('/transfer-money-save', [\App\Http\Controllers\User\UserTransactionController::class,'transfer_money_save'])->name('user.transfermoney.save');

        //history
        Route::get('/earning-history', [\App\Http\Controllers\User\UserTransactionController::class,'earning_history'])->name('user.earning.history');
        Route::get('/withdraw-history', [\App\Http\Controllers\User\UserTransactionController::class,'withdraw_history'])->name('user.withdraw.history');
        Route::get('/send-money-history', [\App\Http\Controllers\User\UserTransactionController::class,'send_money_history'])->name('user.sendmoney.history');
        Route::get('/mobile-recharge-history', [\App\Http\Controllers\User\UserTransactionController::class,'mobile_recharge_history'])->name('user.mobile.recharge.history');


    });
});




Route::prefix('admin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'showLoginform'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');

        //admin profile
        Route::get('/profile', [\App\Http\Controllers\Admin\AdminController::class,'profile'])->name('admin.profile');
        Route::post('/profile-update', [\App\Http\Controllers\Admin\AdminController::class,'profile_update'])->name('admin.profile.update');

        //password
        Route::get('/password-change', [\App\Http\Controllers\Admin\AdminController::class,'password_change'])->name('admin.password');
        Route::post('/password-change-update', [\App\Http\Controllers\Admin\AdminController::class,'password_change_update'])->name('admin.password.update');

        //general setting
        Route::get('/general-setting', [\App\Http\Controllers\Admin\AdminController::class,'general_settings'])->name('admin.general.settings');
        Route::post('/general-setting-update', [\App\Http\Controllers\Admin\AdminController::class,'general_settings_update'])->name('admin.general.settings.update');

        //survey question
        Route::get('/survey-question', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey'])->name('admin.survey.question');
        Route::get('/survey-question-get', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey_get'])->name('admin.get.survey');
        Route::get('/create-survey-question', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey_create'])->name('admin.create.survey.question');
        Route::post('/save-survey-question', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey_save'])->name('admin.survey.question.save');
        Route::get('/edit-survey-question/{id}', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey_edit'])->name('admin.edit.survey');
        Route::post('/survey-question-update', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey_update'])->name('admin.survey.question.update');
        Route::post('/survey-question-delete', [\App\Http\Controllers\Admin\AdminSurveyController::class,'survey_delete'])->name('admin.survey.question.delete');

        //users
        Route::get('/active-users', [\App\Http\Controllers\Admin\AdminUserController::class,'active_users'])->name('admin.active.users');
        Route::get('/active-users-get', [\App\Http\Controllers\Admin\AdminUserController::class,'active_users_get'])->name('admin.get.activeuser');
        Route::get('/inactive-users', [\App\Http\Controllers\Admin\AdminUserController::class,'inactive_users'])->name('admin.inactive.users');
        Route::get('/inactive-users-get', [\App\Http\Controllers\Admin\AdminUserController::class,'inactive_users_get'])->name('admin.get.inactiveuser');



        //user pin
        Route::get('/user-pin', [\App\Http\Controllers\Admin\AdminPinSurveyController::class,'user_pin'])->name('admin.user.pin');
        Route::get('/user-pin-get', [\App\Http\Controllers\Admin\AdminPinSurveyController::class,'user_pin_get'])->name('admin.get.userpin');
        Route::get('/create-pin', [\App\Http\Controllers\Admin\AdminPinSurveyController::class,'create_pin'])->name('admin.create.pin');
        Route::post('/create-pin-save', [\App\Http\Controllers\Admin\AdminPinSurveyController::class,'create_pin_save'])->name('admin.user.pin.save');

        //mobile recharge
        Route::get('/mobile-recharge', [\App\Http\Controllers\Admin\AdminTransactionController::class,'mobile_recharge'])->name('admin.mobile.recharge');
        Route::get('/mobile-recharge-get', [\App\Http\Controllers\Admin\AdminTransactionController::class,'mobile_recharge_get'])->name('admin.get.mobile.recharge');
        Route::post('/mobile-recharge-status-change', [\App\Http\Controllers\Admin\AdminTransactionController::class,'mobile_recharge_save'])->name('admin.mobile.recharge.save');

        //withdraw money
        Route::get('/withdraw-money', [\App\Http\Controllers\Admin\AdminTransactionController::class,'withdraw_money'])->name('admin.withdraw.money');
        Route::get('/withdraw-money-get', [\App\Http\Controllers\Admin\AdminTransactionController::class,'withdraw_money_get'])->name('admin.get.withdrawmoney');
        Route::post('/withdraw-money-status-change', [\App\Http\Controllers\Admin\AdminTransactionController::class,'withdraw_money_status_change'])->name('admin.withdraw.money.save');
    });
});
