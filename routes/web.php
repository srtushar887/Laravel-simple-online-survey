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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


//user register
Route::post('/register', [\App\Http\Controllers\Auth\CustomLoginController::class,'custom_register'])->name('user.custom.register');
Route::post('/login', [\App\Http\Controllers\Auth\CustomLoginController::class,'custom_login'])->name('user.login');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [\App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

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
        Route::post('/post-like-save', [\App\Http\Controllers\User\UserPostController::class,'post_like_save'])->name('user.post.like.save');
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
    });
});
