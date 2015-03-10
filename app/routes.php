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


//get Add Company Form

Route::get('add_company', array('uses' => 'HomeController@showAddCompany'));


//edit a company info

Route::get('add_company/id/{id}',array('uses' => 'HomeController@editCompany'));


//process Add Company form

Route::post('add_company', array('uses' => 'HomeController@doAddCompany'));


//get list Companies of a user

Route::get('list_company', array('uses' => 'HomeController@showCompanies'));

//Get a company info by id

Route::get('company_info/id/{id}',array('uses' => 'HomeController@showCompanyInfo'));

//Delete a company by id

Route::get('delete_company/action/{delete}/id/{id}',array('uses' => 'HomeController@showCompanies'));

//Archive the company by id

Route::get('archive_company/action/{action}/id/{id}',array('uses' => 'HomeController@showCompanies'));

//Active the company by id

Route::get('active_company/action/{action}/id/{id}',array('uses' => 'HomeController@showArchives'));

//List of company archives

Route::get('list_company/action/{archive}',array('uses' => 'HomeController@showArchives'));


