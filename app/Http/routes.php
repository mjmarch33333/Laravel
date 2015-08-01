<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home','HomeController@index');
Route::get('test/{id}','HomeController@test');

// Appointment Routes
Route::get('appointments','AppointmentController@index');
Route::get('appointments/create/{date}/{hour}/{minute}','AppointmentController@getUserSchedule');
Route::post('appointments/create/{date}/{hour}/{minute}','AppointmentController@getCreate');
Route::get('appointments/createwithuser/{date}/{hour}/{minute}/{id}','AppointmentController@getCreateWithUser');
Route::post('appointments/store/{idtoupdate}','AppointmentController@store');
Route::get('appointments/viewall', 'AppointmentController@viewAll');
Route::get('appointments/showbyuser/{id}', 'AppointmentController@viewByUser');
Route::get('appointments/showbydate/{date}/{id}', 'AppointmentController@viewByDate');
Route::get('appointments/edit/{id}', 'AppointmentController@edit');
Route::post('appointments/edit/{id}', 'AppointmentController@update');
Route::get('appointments/test/{date}', 'AppointmentController@test');
Route::post('appointments/gotodate/{id}', 'AppointmentController@goToDate');
Route::get('appointments/delete/{id}', 'AppointmentController@previewDelete');
Route::post('appointments/delete/{id}', 'AppointmentController@performDelete');

// Admin Routes
Route::get('admin/viewallusers','AdminController@viewAllUsers');
Route::get('admin/createnewuser','AdminController@formNewUser');
Route::post('admin/createnewuser','AdminController@createNewUser');
Route::get('admin/viewuser/{id}','AdminController@viewUser');
Route::post('admin/viewuser/{id}','AdminController@update');
Route::get('admin/sendsimplesms', 'AdminController@setupSimpleSMS');
Route::post('admin/sendsimplesms', 'AdminController@sendSimpleSMS');
Route::get('admin/test', 'AdminController@test');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

