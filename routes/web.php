<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/v1/auth/login', 'AuthController@login');
Route::middleware(\App\Http\Middleware\VerifyToken::class)->get('/v1/auth/logout', 'AuthController@logout');

Route::middleware(\App\Http\Middleware\VerifyToken::class)->get('/v1/place', 'PlaceController@all');
Route::middleware(\App\Http\Middleware\VerifyToken::class)->get('/v1/place/{id}', 'PlaceController@find');
Route::middleware(\App\Http\Middleware\VerifyAdminToken::class)->post('/v1/place', 'PlaceController@create');
Route::middleware(\App\Http\Middleware\VerifyAdminToken::class)->delete('/v1/place/{id}', 'PlaceController@delete');
Route::middleware(\App\Http\Middleware\VerifyAdminToken::class)->post('/v1/place/{id}', 'PlaceController@update');

Route::middleware(\App\Http\Middleware\VerifyAdminToken::class)->post('/v1/schedule', 'ScheduleController@create');
Route::middleware(\App\Http\Middleware\VerifyAdminToken::class)->delete('/v1/schedule/{id}', 'ScheduleController@delete');
