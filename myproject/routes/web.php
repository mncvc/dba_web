<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\StatsController;
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

// 로그인
Route::get('/login', [UserController::class, 'index'])->name('admin.show');
Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

Route::post('/login', [UserController::class, 'login'])->name('admin.login');
Route::get('/createQr', [UserController::class, 'createQr'])->name('admin.createQr');
Route::get('/otpAuth', [UserController::class, 'showOtp'])->name('admin.showOtp');
Route::post('/otpAuth', [UserController::class, 'otpProcess'])->name('admin.otpAuth');

// 회원가입
Route::get('/signup', [UserController::class, 'signUpForm'])->name('admin.signup');
Route::post('/signup', [UserController::class, 'signUpProcess'])->name('admin.signup2');

Route::get('/user', [UserController::class, 'showUser'])->name('admin.user')->middleware('basic_auth');

Route::get('/member/detail', [UserController::class, 'detail'])->name('admin.detail')->middleware('basic_auth');
Route::get('/member/mypage', [UserController::class, 'myPage'])->name('admin.mypage')->middleware('basic_auth');

Route::post('/member/otpReset', [UserController::class, 'otpReset'])->name('admin.otpReset');
;
