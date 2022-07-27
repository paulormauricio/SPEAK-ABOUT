<?php

class usersController extends BaseController {

	private static $rules = array(
				'firstName'      	=> 'Required',
				'lastName'      	=> 'Required',
				'email'    			=> 'Required|email'
				);
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.users.index')
        	->with(array(
    			'users' => User::all(),
    			'i' => 1
			));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;
		$user->isActive		= true;

		// show the edit form and pass the user
		return View::make('admin.users.create')
			->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		
		$validator = Validator::make(Input::all(), static::$rules);


		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/users/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = New User;
			$user->firstName        = Input::get('firstName');
			$user->lastName			= Input::get('lastName');
			$user->email      		= Input::get('email');
			$user->company_id      	= Input::get('company_id');
			$user->birthday      	= Input::get('birthday');
			$user->isActive      	= Input::get('isActive');
			$user->isAdmin      	= Input::get('isAdmin');
			$user->save();

			// redirect
			Session::flash('message', Lang::get('admin.createUserSuccess'));
			return Redirect::to('admin/users');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the user
		$user = User::find($id);

		// show the view and pass the user to it
		return View::make('admin.users.show')
			->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the user
		$user = User::find($id);

		IF( is_null($user)) {
			Return 'Internal Error!';
		}

		// show the edit form and pass the user
		return View::make('admin.users.edit')
			->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		
		$validator = Validator::make(Input::all(), static::$rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/users/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store

			$user = User::find($id);
			IF( is_null($user)) $user = New User;
			$user->firstName        = Input::get('firstName');
			$user->lastName			= Input::get('lastName');
			$user->email      		= Input::get('email');
			$user->company_id      	= Input::get('company_id');
			$user->birthday      	= Input::get('birthday');
			$user->isActive      	= Input::get('isActive');
			$user->isAdmin      	= Input::get('isAdmin');
			$user->save();

			// redirect
			Session::flash('message', Lang::get('admin.editUserSuccess'));
			return Redirect::to('admin/users');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message', Lang::get('admin.deleteCompanySuccess'));
		return Redirect::to('admin/users');
	}

}

