<?php

class PublicPollsController extends BaseController {


	private static $rules = array(
				'questionName'       => 'Required'
				);
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.public_polls.index')
        	->with(array(
    			'public_polls' => PublicPoll::all()
			));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$public_poll = new PublicPoll;
		$public_poll->isActive      = true;

		// show the edit form and pass the public_poll
		return View::make('admin.public_polls.create')
			->with('public_poll', $public_poll);
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
			return Redirect::to('admin/public_polls/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$public_poll = New PublicPoll;
			$public_poll->questionName       	= Input::get('questionName');
			$public_poll->lastResponseDate		= Input::get('lastResponseDate');
			$public_poll->isActive      		= true;
			$public_poll->save();

			// redirect
			Session::flash('message', Lang::get('admin.createPollSuccess'));
			return Redirect::to('admin/public_polls/'.$public_poll->id);
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
		// get the public_poll
		$public_poll = PublicPoll::find($id);
		$public_poll_options = PublicPoll::getOptions($id);
		// dd($public_poll_options);

		// show the view and pass the public_poll to it
		return View::make('admin.public_polls.show')
			->with('public_poll', $public_poll)
			->with('public_poll_options', $public_poll_options);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the public_poll
		$public_poll = PublicPoll::find($id);

		IF( is_null($public_poll)) {
			Return 'Internal Error!';
		}

		// show the edit form and pass the public_poll
		return View::make('admin.public_polls.edit')
			->with('public_poll', $public_poll);
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
			return Redirect::to('admin/public_polls/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$public_poll = PublicPoll::find($id);
			IF( is_null($public_poll)) $public_poll = New PublicPoll;
			$public_poll->questionName 		= Input::get('questionName');
			$public_poll->lastResponseDate	= Input::get('lastResponseDate');
			$public_poll->isActive      	= Input::get('isActive');
			$public_poll->save();

			// redirect
			Session::flash('message', Lang::get('admin.editPollSuccess'));
			return Redirect::to('admin/public_polls/'.$public_poll->id);
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
		$public_poll = PublicPoll::find($id);
		$public_poll->delete();

		// redirect
		Session::flash('message', Lang::get('admin.editPollSuccess'));
		return Redirect::to('admin/public_polls');
	}

}

