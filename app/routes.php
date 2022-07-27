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

Route::resource('admin/dashboard', 'DashboardController', array('only' => array('index')));
Route::resource('admin/companies', 'CompaniesController');
Route::resource('admin/users', 'UsersController');

Route::resource('admin/public_polls', 'PublicPollsController');
Route::resource('admin/public_polls.public_poll_options', 'PublicPollsOptionsController',array('except' => array('index')));

/** Define filter to all admin actions **/
Route::when('admin/*', 'isAdmin');


/** Login/Register Routes **/
Route::get('/', array(
  'uses' => 'loginController@index',
  'as' => 'home'
));

Route::post('/', array(
  'uses' => 'loginController@login',
  'as' => 'home'
));

Route::post('register', array(
  'uses' => 'loginController@register',
  'as' => 'register'
));

Route::get('register', array(
  'uses' => 'loginController@index',
  'as' => 'register'
));

Route::get('logout', array(
  'uses' => 'loginController@logout',
  'as' => 'logout'
))->before('auth');


Route::get('welcome', function() {


  if ( User::isAdmin(Auth::user()->id) ) {
    return Redirect::to('admin/dashboard');
  }

  return View::make('welcome');

})->before('auth');




Route::get('teste', function() {
  return 'Ecrã de teste';
  dd(User::isAdmin(Auth::user()->id));
});



/** Email Routes **/
Route::get('email', function() {

	$data['name'] = 'Paulo';

	// Mail::pretend();
	Mail::send('emails.auth.accountActivation', $data, function($message){
		$message->to('pmauricio@maksen.com')->subject('Welcome');
	});

	return 'Email sent!';
});


/*
Event::Listen('laravel.query', function(){
	var_dump($sql);
});*/
