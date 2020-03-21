<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::fallback('HomeController@fallback');

$route = app('Fc9\Api\Routing\Router');

$route->version('v1', ['namespace' => '\App\Http\Controllers\Api'], function ($route) {

    $route->get('version', 'ApiController@version')->name('version');;

    $route->group(['prefix' => 'users', 'as' => 'users'], function ($route) {
        $route->get('', 'UsersController@index')->name('.index');
        $route->post('', 'UsersController@store')->name('.store');
        $route->get('/{uuid}', 'UsersController@show')->name('.show');
        $route->put('/{uuid}', 'UsersController@update')->name('.update');
        $route->delete('/{uuid}', 'UsersController@destroy')->name('.destroy');
        //$route->resource('users', 'UsersController', ['except' => ['create', 'edit']]);
    });

});

//Route::group([/*'middleware' => 'auth:api',*/ 'namespace' => 'Api'], function () {
//    Route::post('logout', 'LoginController@logout');
//    Route::post('login', 'LoginController@login');
//    Route::post('login-disabled', 'APIController@logcomposer inDisabled');
//    Route::post('login-help', 'APIController@loginHelp');
//    Route::post('captcha', 'APIController@captcha');
//    Route::post('register-1', 'APIController@register1');
//    Route::post('register-2', 'APIController@register2');
//    Route::post('register-3', 'APIController@register3');
//    Route::post('register-disabled', 'APIController@registerDisabled');
//    Route::post('register-minimum-requirements', 'APIController@registerMinimumRequirements');
//    Route::post('forgot-password', 'APIController@forgotPassword');
//    Route::post('forgot-email', 'APIController@forgotEmail');
//    Route::post('user-blocked', 'APIController@userBlocked');
//    Route::post('user-banned', 'APIController@userBanned');
//    Route::post('under-maintenance', 'APIController@underMaintenance');
//    Route::post('page-404', 'APIController@page404');
//    Route::post('page-500', 'APIController@page500');
//    Route::post('inactivity', 'APIController@inactivity');
//});
