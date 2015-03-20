<?php

class HomeController extends BaseController {

/*
|--------------------------------------------------------------------------
| Default Home Controller
|--------------------------------------------------------------------------
|
Author: Soumya Kolloon
-------------------
| You may wish to use controllers instead of, or in addition to, Closure
| based routes. That's great! Here is an example controller method to
| get you started. To route to this controller, just add the route:
|
|	Route::get('/', 'HomeController@showWelcome');
|
*/

public function showWelcome()
{

return View::make('bridge_info');

}


/**Get the Login form*/

public function showLogin()
{
return View::make('login');
}


/**Get the registration form**/

public function showRegister()
{

return View::make('register');

}



/**Do the Login form*/

public function doLogin()
{

// validate the info, create rules for the inputs

$rules = array(
'email'    => 'required|email', // make sure the email is an actual email
'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
return Redirect::to('login')
->withErrors($validator) // send back all errors to the login form
->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {
 
// create our user data for the authentication
$userdata = array(
'email'     => Input::get('email'),
'password'  => Input::get('password'),

);



// attempt to do the login
if (Auth::attempt($userdata)) {



// redirect them to the secure section or whatever
return View::make('bridge_info');
// for now we'll just echo success (even though echoing in a controller is bad)


} else {        


// validation not successful, send back to form 
$message = "Invalid Username/ password";
return View::make('login')->with('msg', $message);


}

}

}

/**Process registration*/

public function doRegister()
{
// validate the info, create rules for the inputs

if(Input::get('user_id') && Input::get('user_id')!= "")
{

$rules = array(
'email'    => 'required|email', // make sure the email is an actual email

'name' => 'required',
'empcode'=> 'required |numeric'
);

}
else
{

$rules = array(
'email'    => 'required|email', // make sure the email is an actual email
'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
'name' => 'required',
'empcode'=> 'required |numeric'
);
}



// run the validation rules on the inputs from the form

$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form

if ($validator->fails()) {
return Redirect::to('register')
->withErrors($validator) // send back all errors to the login form
->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} 

else 
{

/*
Check request came form edit form or create form
**/
$userObj = new User();

if(Input::get('user_id') && Input::get('user_id')!= "")
{

$userdata = array(
'email'     => Input::get('email'),
'first_name' => Input::get('name'),
'empcode' => Input::get('empcode'),
);

$user_id = Input::get('user_id');

$nameArr = explode(' ', $userdata['first_name']);




User::where('id', $user_id)->update(array(
'first_name'    =>  $nameArr[0],
'last_name' => $nameArr[1],
'email' =>  $userdata['email'],
'emp_code' => $userdata['empcode'],
'status' => 1,
));



$user_list = DB::table('users')
       // ->where('role', '=', '2')
        ->Where('Status', '=','1')
        ->get();

        // echo '<pre>';
        // print_r($user_list); exit;

return View::make('list_users', array('user_list' => $user_list));

}
else
{

$userdata = array(
'email'     => Input::get('email'),
'password'  => Hash::make(Input::get('password')),
'first_name' => Input::get('name'),
'empcode' => Input::get('empcode'),
'status' => 1,
);


$userObj->email = $userdata['email'];
$userObj->password = $userdata['password'];
$userObj->first_name = $userdata['first_name'];
$userObj->emp_code = $userdata['empcode'];

$userObj->status =1;



$userExist = $users = DB::table('users')
        ->where('email', '=', Input::get('email'))
        ->where('emp_code', '=', Input::get('empcode'))

        ->get();

//  User::where('email', '=', Input::get('email'))->where('password', '=', Hash::make(Input::get('password')))->first();

//print_r(count($userExist)); die();    

if(count($userExist)==0)
{
if($userObj->save())
{


// $uu = array(
// 'email'     => Input::get('email'),
// 'password'  => Input::get('password'),
//      'status' => 1, 
//     );


// Auth::attempt($uu);


return View::make('register')->with('message','User added successfully');


}
}
else
{
return View::make('register')->with('message', 'User already existing');

}

}





}


}


/*
**
Add new Company form display
* @Date: 09-03-2015
*
*
***/

public function showAddCompany()
{
return View::make('add_company');
}




/*

Edit a company form

**/
/*
*Add new Company form display
*
@Date: 09-03-2015

***/

public function editCompany($id)
{

$company_info = DB::table('company')
        ->where('userid', '=', Auth::user()->id)
        ->Where('id', '=', $id)
        ->get();

if(!empty($company_info))

return View::make('add_company')->with(array('company_info' =>  $company_info));

else

return View::make('add_company')->with(array('emessage' =>  "ooph!!! No active company available with the selected name"));

}




/*
*Add new Company form processing

* @Date: 09-03-2015

***/
public function doAddCompany()
{
$rules = array(
'company_name'    => 'required', 
'description'    => 'required',
'country'    => 'required',
'city'    => 'required',
'address'    => 'required',


);

// run the validation rules on the inputs from the form

$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form

if ($validator->fails()) {
return Redirect::to('add_company')
->withErrors($validator)
->withInput(); // send back all errors to the login form

}
else
{

/**Save the data on sccessful validation***/

$companydata = array(
'company_name'     => Input::get('company_name'),
'description'  => Input::get('description'),
'country'  => Input::get('country'),
'city'  => Input::get('city'),
'address'  => Input::get('address'),

);

//print_r(Auth::user()->id); exit;

$compObj = new Company();

$compObj->company_name = $companydata['company_name'];
$compObj->description = $companydata['description'];
$compObj->country = $companydata['country'];
$compObj->city = $companydata['city'];
$compObj->address = $companydata['address'];
$compObj->userid = Auth::user()->id;
$compObj->status =1;


/**Check the data came for updation or addition*/

if(Input::get('company_id') && Input::get('company_id')!= "")
{
/**Update the edited content**/

$company_id = Input::get('company_id');


Company::where('id', $company_id)->update(array(
'company_name'    =>  $companydata['company_name'],
'address' =>  $companydata['address'],
'description' => $companydata['description'],
'city'  => $companydata['city'],
'country' => $companydata['country'],
'userid'  => Auth::user()->id,
));

return View::make('add_company')
->with('message', 'Company details updated successfully.')->withInput(Input::all());

}

else
{
$companyExist = DB::table('company')
        ->where('company_name', '=', Input::get('company_name'))

        ->get();



if(count($companyExist)==0)
{



//print_r($compObj); exit;
if($compObj->save())

return View::make('add_company')
->with('message', 'Company added successfully.');


}
else
{
return View::make('add_company')->with('emessage', 'Wohoo!!! company already added.')->withInput(Input::all());
}

}






//return View::make('add_company');
}



}


/*

*Display list of companies of logged in user
* @Date: 09-03-2015
*
**/

public function showCompanies($action='', $id=null)
{


if($id!=null)
{
if($action=='delete')

$delete_company_info = DB::table('company')->where('id', '=', $id)->delete();

else if($action=='archive')

$archive_company = DB::table('company')->where('id', '=', $id)->update(array('status'=> '0'));


}




$list_companies = DB::table('company')
        //->where('userid', '=', Auth::user()->id)
        ->where('status','=',1)
        ->get();



return View::make('list_company')->with(array('list_comp' =>$list_companies));
}




/***

@author Soumya Kolloon, 
Date  10/03/2015
Funciton to show arvied company details

***/

public function showArchives($action='', $id=null)
{
if($id!=null)
{
if($action=='active')
$active_company = DB::table('company')->where('id', '=', $id)->update(array('status'=> '1'));
}

$list_companies = DB::table('company')
        ///->where('userid', '=', Auth::user()->id)
        ->where('status','=',0)
        ->get();



return View::make('list_company')->with(array('list_comp' =>$list_companies));

}



/*
*Display particular company info

* @Date: 09-03-2015

***/

public function showCompanyInfo($id)
{


$company_info = DB::table('company')
        //->where('userid', '=', Auth::user()->id)
        ->Where('id', '=', $id)
        ->get();

return View::make('company_info')->with(array('company_info' => $company_info));

}




/**Dashboard page**/

public function displayDashboard()
{


//$user = new User;

//echo Auth::user()->hasRole("employee");

//exit;

return View::make('dashboard'); // redirect the user to the login screen
}



/**Logout form**/

public function doLogout()
{
Auth::logout(); // log the user out of our application
return View::make('dashboard');// redirect the user to the login screen
}

/*

*@author: soumyakolloon
@date: 10/03/2015
Display form for adding new User

**/

public function showUsers($action='', $id=null)
{


if($id!=null)
{
if($action=='delete')

$delete_user_info = DB::table('users')->where('id', '=', $id)->delete();

else if($action=='deactive')

$deactive_users = DB::table('users')->where('id', '=', $id)->update(array('Status'=> '0'));


}

$user_list = DB::table('users')
       // ->where('role', '=', '2')
        ->Where('Status', '=','1')
        ->get();

        // echo '<pre>';
        // print_r($user_list); exit;

return View::make('list_users', array('user_list' => $user_list));

}


/*

@Author Soumya kolloon

Date: 11/03/2015

show List of deactivated users
***/

public function showDeactiveUsers($action='', $id=null)
{
       
        if($id!=null)
        {
        if($action=='active')
        $active_user = DB::table('users')->where('id', '=', $id)->update(array('Status'=> '1'));
        }

        $user_list = DB::table('users')
        ///->where('userid', '=', Auth::user()->id)
        ->where('Status','=', 0)
        ->get();

        return View::make('list_users', array('user_list' => $user_list));
}



/*

Edit Users info by id

*
**/

public function editUser($id=null)
{

$user_info = DB::table('users')
        ->Where('id', '=', $id)
        ->Where('status', '=', 1)
        ->get();

if(!empty($user_info))

return View::make('register')->with(array('user_info' =>  $user_info));

//else

//return View::make('add_company')->with(array('emessage' =>  "ooph!!! No active company available with the selected name"));


}




}
