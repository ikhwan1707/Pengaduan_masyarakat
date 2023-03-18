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

Route::middleware(['auth','ceklevel:admin'])->group(function () {
    //admin
    Route::get('dashboard', 'CustomAuthController@dashboard')->name('dashboard'); 
   
});

Route::middleware(['auth','ceklevel:masyarakat'])->group(function () {
    //masyarakat
    Route::get('masyarakat_pengaduan', 'MasyarakatController@history')->name('masyarakat_pengaduan.history'); 
    Route::get('masyarakat_pengaduan/create', 'MasyarakatController@create')->name('masyarakat_pengaduan.create'); 
    Route::post('masyarakat_pengaduan', 'MasyarakatController@store')->name('masyarakat_pengaduan.store'); 
});

Route::get('/', 'MasyarakatController@index')->name('dashboardMasyarakat');

Route::get('user_profile', 'UserprofileController@index')->name('user_profile');
Route::put('user_profile/{id}','UserprofileController@update')->name('user_profile.update');
Route::post('getKota', 'UserprofileController@getKota')->name('getKota');//getkota
Route::post('getKecamatan', 'UserprofileController@getKecamatan')->name('getKecamatan');//getkemacatan
Route::post('getKelurahan', 'UserprofileController@getKelurahan')->name('getKelurahan');//getkelurahan

// Authentication Routes...
Route::get('login', 'CustomAuthController@showLoginForm')->name('login');
Route::post('login', 'CustomAuthController@login');
Route::get('signOut', 'CustomAuthController@signOut')->name('signOut');

// Registration Routes...
Route::get('registration', 'CustomAuthController@showRegistrationForm')->name('registration');
Route::post('register', 'CustomAuthController@register')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'CustomAuthController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'CustomAuthController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'CustomAuthController@showResetForm')->name('password.reset');
Route::post('password/reset', 'CustomAuthController@reset')->name('password.update');

// Confirm Password (added in v6.2)
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
/* Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); // v5.x */
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

