<?php

class loginController extends BaseController {

	public function index()
	{
		if (Auth::check()) return Redirect::guest('welcome');

		
        return View::make('login')
        		->with('login', 0);
	}


	public function login()
	{

		$rules = array(
				'email'    		=> 'Required|email',
        		'password'  	=> 'Required|Between:7,15'
				);
        
        $user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        
		// validate
		$validator = Validator::make($user, $rules);

		if ($validator->fails()) {
        	return View::make('login')
        		->withErrors($validator)
        		->with('login', 1)
				->withInput(Input::except('password'));
		}

		//Login

		if (Auth::attempt(array('email' => $user['email'], 'password' => $user['password'], 'isActive' => 1), true)) {

            return Redirect::intended('welcome');
        }
        
        // authentication failure! lets go back to the login page
        return View::make('login')
        	->withErrors('Your username/password combination was incorrect.')
        	->with('login', 1)
			->withInput(Input::except('password'));

	}


	public function register()
	{
		$rules = array(
				'firstName'     => 'Required',
				'lastName'      => 'Required',
				'email'    		=> 'Required|email',
        		'password'  	=> 'Required|Between:7,15'
				);

        $input = array(
            'firstName' 	=> Input::get('firstName'),
            'lastName' 	=> Input::get('lastName'),
            'email' 	=> Input::get('email'),
            'password' 	=> Input::get('password')
        );

		// validate
		$validator = Validator::make($input, $rules);
		
		if ($validator->fails()) {
			return Redirect::to('/')
        		->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = New User;
			$user->firstName        = Input::get('firstName');
			$user->lastName			= Input::get('lastName');
			$user->email      		= Input::get('email');
			$user->password      	= Hash::make(Input::get('password'));
			$user->isActive      	= true;
			$user->isAdmin      	= false;
			$user->save();

			//Redirect to login
			return View::make('login')
        		->with('login', 1)
				->withInput(Input::except('password'));

		}
	}

	public function logout()
	{
        Auth::logout();

    	return Redirect::route('home')
        	->with('flash_notice', 'You are successfully logged out.');

	}

}

