<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Admin Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		if (Auth::check()) {
			return View::make('admin.index');
		} 
		return Redirect::to('admin/login');
	}

	public function getLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('admin'); // redirect the user to the login screen
	}

	public function getLogin()
	{
		// echo "AAAA";
		return View::make('admin.login');
	}

	public function postLogin()
	{

		// validate the info, create rules for the inputs

		$rules = array(
			// 'email'    => 'required|email', // make sure the email is an actual email
			'username' => 'required|min:3', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
			);

		$validator = Validator::make(Input::all(), $rules);

		
		if ($validator->fails()) {
			return Redirect::to('admin/login')
			->withErrors($validator) 
			->withInput(Input::except('password')); 
		} else {

			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
				);

			if (Auth::attempt($userdata,Input::get('remember'))) {
				return Redirect::to('admin');
			} else {	 	
				return Redirect::to('admin/login')->with('message', 'username atau password Anda salah')->withInput(Input::except('password'));
			}

		}	
	}	
}

