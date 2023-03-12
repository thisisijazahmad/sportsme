<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\ProgramsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\PaymentController;
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


Route::controller(RegisterController::class)->group(function () {
    Route::get('register/{id?}', 'regView');
    Route::post('create', 'Create');
});
// <=================================== Auth Route ===================>
Route::controller(LoginController::class)->group(function () {
    Route::get('page', 'ShowloginPage');
    Route::post('login', 'authenticate');
    Route::get('logout/{id?}', 'logout');

});
Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index');
    Route::get('users/list', 'usersList');
    Route::get('messages/list', 'messagesList');
});
Route::controller(ProgramsController::class)->group(function () {
    Route::get('programs/list', 'programList');
    Route::get('programs_add/{id?}', 'addPrograms');
    Route::post('save_program', 'savePrograms');
});
Route::controller(PaymentController::class)->group(function () {
    Route::get('donate_now/{id?}', 'donateNow');
    Route::post('save_donation','saveDonation');
    Route::post('stripe','stripePost');
});
Route::controller(PlayerController::class)->group(function () {
    Route::get('player/profile', 'playerProfile');
    // Route::get('add_programs/{id?}', 'addPrograms');
     Route::post('save_profile', 'saveProfile');
     Route::get('follow/{id?}', 'Follow');
});
Route::controller(mainController::class)->group(function () {
    Route::post('index', 'index');
    Route::get('home', 'Home');
    Route::get('about_us', 'aboutUs');
    Route::get('profile/{id?}', 'Profile');
    Route::get('view_profile/{id?}', 'viewProfile');
    Route::get('works', 'Works');
    Route::get('events', 'Events');
    Route::get('/', 'Login');
    Route::get('message/{id?}','messagePost');
    Route::post('save_message','saveMessage');
    Route::get('affiliate', 'Affiliate');
    Route::get('reward/{id}', 'Rewards');
    Route::post('like_unlike','likeUnlike');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


