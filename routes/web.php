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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Login & Regsiter Routes
Route::get('/d/register', 'Auth\DrRegisterController@showRegistrationForm');
Route::post('/d', 'Auth\DrRegisterController@register');
Route::get('/d/login', 'Auth\DrLoginController@showLoginForm');
Route::post('/d', 'Auth\DrLoginController@login');
Route::get('/d/{doctor}','Auth\DrLoginController@show');
Route::get('/d/{user}', 'Auth\DrLoginController@showLoginForm');
Route::post('/d/logout', 'Auth\DrLoginController@logout');

//Profile Routes
Route::get('/profile/{user}','ProfileController@show')->name('profile.show');
Route::post('/profile','ProfileController@store')->name('profile.store');
Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');
Route::put('/profile/{user}','ProfileController@update')->name('profile.update');
Route::get('/profile','ProfileController@changePwd');
Route::post('/profile/{user}','ProfileController@storepwd')->name('profile.store');

//Doctor Routes
Route::get('/d','DoctorController@index')->name('doctor.index');

//Appointment Routes
Route::get('/appointment/create','AppointmentController@create')->name('appointment.create');
Route::post('/profile','AppointmentController@store')->name('appointment.store');
Route::get('/appointment','AppointmentController@show')->name('appointment.show');