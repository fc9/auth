<?php

use Illuminate\Support\Facades\Route;

// ------------------------------------------------------------------------- //
// Home
// ------------------------------------------------------------------------- //

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

// ------------------------------------------------------------------------- //
// Register
// ------------------------------------------------------------------------- //


//Route::group(['prefix' => 'auth', 'as' => 'auth'], function () {
//    Route::get('/', 'AuthController@index');
//});

//# Log Up
//Route::group(['prefix' => 'signup', 'namespace' => 'SignUp', 'as' => 'signup', 'middleware' => 'guest'], function () {
//
//    Route::get('', 'SignUpController@home')->name('.home');
//    Route::get('invitation/{indicator}', 'SignUpController@home');
//
//    Route::get('identify/{indicator?}', 'IdentifyController@showIdentifyForm')->name('.identify');
//    Route::post('identify', 'IdentifyController@identify');
//
//    Route::get('confirm_email', 'ConfirmEmailController@sendConfirmLink')->name('.confirm_email');
//    Route::get('confirm_email/{token}', 'ConfirmEmailController@confirm');
//
////    Route::get('register', 'RegisterController@showRegisterForm')->name('.register');
////    Route::post('register', 'RegisterController@register');
////
////    Route::post('verify_phone', 'PhoneController@checkCode')->name('.check'); #Ajax
////    Route::get('register', 'RegisterController@showRegisterForm')->name('.step2');
////    Route::post('register', 'RegisterController@register');
////
////    Route::group(['middleware' => 'auth'], function () {
////        Route::get('confirm', 'RegisterController@showConfirmForm')->name('.step3');
////        Route::post('confirm', 'RegisterController@confirm');
////    });
//
//});
//
//Route::get('invitation/{indicator?}', 'RegisterController@home')->middleware('guest')->name('invitation');
//
//# Log In
//Route::group(['prefix' => 'login', 'as' => 'login', 'middleware' => 'guest'], function () {
//    Route::get('', 'LoginController@showLoginForm');
//    Route::post('', 'LoginController@login');
//    Route::get('/disabled', 'LoginController@disabled')->name('.disabled');
//    Route::get('/help', 'LoginController@help')->name('.help');
//});
//
//# Log Out
//Route::post('logout', 'LoginController@logout')->middleware('auth')->name('logout');
//
//# Reset Password
//Route::group(['prefix' => 'password', 'as' => 'password', 'middleware' => 'guest'], function () {
//    Route::get('forgot', 'PasswordController@showForgotPasswordForm')->name('.forgot');
//    Route::post('forgot', 'PasswordController@sendPasswordResetLinkEmail');
//    Route::get('reset/{token}', 'PasswordController@showResetPasswordForm')->name('.reset');
//    Route::post('reset', 'PasswordController@reset');
//});


//Route::group(['prefix' => 'labs', 'namespace' => 'Labs'], function () {
//    Route::get('login', 'LabsController@login');
//    Route::get('login-disabled', 'LabsController@loginDisabled');
//    Route::get('login-help', 'LabsController@loginHelp');
//    Route::get('captcha', 'LabsController@captcha');
//    Route::get('register-1', 'LabsController@register1');
//    Route::get('register-2', 'LabsController@register2');
//    Route::get('register-3', 'LabsController@register3');
//    Route::get('register-disabled', 'LabsController@registerDisabled');
//    Route::get('register-minimum-requirements', 'LabsController@registerMinimumRequirements');
//    Route::get('forgot-password', 'LabsController@forgotPassword');
//    Route::get('forgot-email', 'LabsController@forgotEmail');
//    Route::get('user-blocked', 'LabsController@userBlocked');
//    Route::get('user-banned', 'LabsController@userBanned');
//    Route::get('under-maintenance', 'LabsController@underMaintenance');
//    Route::get('page-404', 'LabsController@page404');
//    Route::get('page-500', 'LabsController@page500');
//    Route::get('inactivity', 'LabsController@inactivity');
//});