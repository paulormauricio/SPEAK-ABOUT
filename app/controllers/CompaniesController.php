<?php

class CompaniesController extends \BaseController {

	private static $rules = array(
				'name'       => 'Required',
				'website'    => 'Required|url'
				);
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.companies.index')
        	->with(array(
    			'companies' => Company::all(),
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
		$company = new Company;
		$company->website = 'http://';
		$company->isActive      = true;

		// show the edit form and pass the company
		return View::make('admin.companies.create')
			->with('company', $company);
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
			return Redirect::to('admin/companies/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$company = New Company;
			$company->name       = Input::get('name');
			$company->website      = Input::get('website');
			$company->description      = Input::get('description');
			$company->contact      = Input::get('contact');
			$company->isActive      = true;
			$company->save();

			// redirect
			Session::flash('message', Lang::get('admin.createCompanySuccess'));
			return Redirect::to('admin/companies');
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
		// get the company
		$company = Company::find($id);

		// show the view and pass the company to it
		return View::make('admin.companies.show')
			->with('company', $company);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the company
		$company = Company::find($id);

		IF( is_null($company)) {
			Return 'Internal Error!';
		}

		// show the edit form and pass the company
		return View::make('admin.companies.edit')
			->with('company', $company);
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
			return Redirect::to('admin/companies/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$company = Company::find($id);
			IF( is_null($company)) $company = New Company;
			$company->name       	= Input::get('name');
			$company->website      	= Input::get('website');
			$company->description   = Input::get('description');
			$company->contact      	= Input::get('contact');
			$company->isActive      = true;
			$company->save();

			// redirect
			Session::flash('message', Lang::get('admin.editCompanySuccess'));
			return Redirect::to('admin/companies');
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
		$company = Company::find($id);
		$company->delete();

		// redirect
		Session::flash('message', Lang::get('admin.editCompanySuccess'));
		return Redirect::to('admin/companies');
	}

}

