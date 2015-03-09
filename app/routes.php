<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('dashboard', array('uses' => 'HomeController@displayDashboard'));

Route::get(' ', ('HomeController@showWelcome'));

//get login form

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));


// route to process the logout
Route::get('logout', array('uses' => 'HomeController@doLogout'));


//get Registration form

Route::get('register', array('uses' => 'HomeController@showRegister'));


//process Registration form

Route::post('register', array('uses' => 'HomeController@doRegister'));
