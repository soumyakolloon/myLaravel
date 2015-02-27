<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('welcome');
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
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        return View::make('dashboard');
        // for now we'll just echo success (even though echoing in a controller is bad)
       

    } else {        

        // validation not successful, send back to form 
        return Redirect::to('login');

    }

}
}

/**Process registration*/
public function doRegister()
{
// validate the info, create rules for the inputs
$rules = array(
    'email'    => 'required|email', // make sure the email is an actual email
    'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
    'name' => 'required|alphaNum'
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return Redirect::to('register')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {
	
	$userdata = array(
        'email'     => Input::get('email'),
        'password'  => Hash::make(Input::get('password')),
    
			);
    
    $userObj = new User();
    
    $userObj->email = $userdata['email'];
    $userObj->password = $userdata['password'];
    
    $userExist = $users = DB::table('users')
                    ->where('email', '=', Input::get('email'))
                    ->orWhere('password', '=', Hash::make(Input::get('password')))
                    ->get();
    
   //  User::where('email', '=', Input::get('email'))->where('password', '=', Hash::make(Input::get('password')))->first();
	
	//print_r(count($userExist)); die();	
		if(count($userExist)==0)
		{
    if($userObj->save())
    {
		
		
		$uu = array(
        'email'     => Input::get('email'),
        'password'  => Input::get('password'),
    			);
			
	        
          Auth::attempt($uu);
		
   		
       return View::make('dashboard');

	
	}
	}
	else
	{
		return View::make('register')->with('message', 'User already existing');
		
	}
	
	
	
	}
   	

}

/**Dashboard page**/

public function displayDashboard()
{
  return View::make('dashboard'); // redirect the user to the login screen
}



/**Logout form**/

public function doLogout()
{
    Auth::logout(); // log the user out of our application
    return View::make('dashboard');// redirect the user to the login screen
}



}
