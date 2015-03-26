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

//route to landing page on both logout and login mode

Route::get('/', ('HomeController@showWelcome'));

Route::get('my_company_info', ('HomeController@showWelcome'));

//get login form

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));


// route to process the logout
Route::get('logout', array('uses' => 'HomeController@doLogout'));


//get Registration form


Route::get('register', array('uses' => 'HomeController@showAddPMuserForm'));

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

//Get List of users

Route::get('list_users',array('uses' => 'HomeController@showUsers'));


//Edit a user info by Id

Route::get('register/id/{id}/page_key/{page_key}',array('uses' => 'HomeController@editUser'));

//Delete a company by id


Route::get('delete_user/action/{delete}/id/{id}/page_key/{page_key}',array('uses' => 'HomeController@showUsers'));

//Deactivate the user by id


Route::get('deactive_user/action/{action}/id/{id}/page_key/{page_key}',array('uses' => 'HomeController@showUsers'));


//Get list of deactivated users

Route::get('deactivate_user/action/{deactive}',array('uses' => 'HomeController@showDeactiveUsers'));

//Active the user by id


Route::get('active_user/action/{action}/id/{id}/page_key/{page_key}',array('uses' => 'HomeController@showDeactiveUsers'));



/*Leave management section starts from here**/

//Apply for new leave form

Route::get('apply_leave',array('uses' => 'LeaveController@showLeavesForm'));

//Process new Leave form

Route::post('apply_leave', array('uses' => 'LeaveController@doLeavesForm'));

/**End of Leave management section starts from here**/

//PM user section starts here

//Show add pm user form

Route::get('add_pm_user', array('uses' => 'HomeController@showAddPMuserForm'));

//Do add pm user form

Route::post('add_pm_user', array('uses' => 'HomeController@doAddPMuserForm'));

//List pm user form


Route::get('list_pm_users', array('uses' => 'HomeController@showPMusers'));

//Display new contract form

Route::get('new_contract', array('uses' => 'HomeController@showNewContracts'));

//Process contract form

Route::post('new_contract', array('uses' => 'HomeController@doNewContracts'));