<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Load the index view on the root page
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/status', 'StatusController@index');
Route::post('/status', 'StatusController@create');
Route::get('/status/{id}', 'StatusController@check');

	// create pdf
	Route::get('/tickets/download/{id}', 'TicketsController@makePdf');

	// print pdf
	Route::get('/tickets/print/{id}', 'TicketsController@printPdf');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
	//Load the index view of the tickets page
	Route::get('/tickets', 'TicketsController@index');

	// Edit existing user
	Route::get('/user/edit/{id}', 'UsersController@edit');

	// Update existing user
	Route::post('/user/edit/{id}', 'UsersController@update');

	// Delete existing user
	Route::delete('/user/delete/{id}', 'UsersController@destroy');

	//dashbaord
	Route::get('/dashboard', 'DashboardController@index');

	//users list
	Route::get('/users', 'UsersController@index');

	// Load register page and display form to crete a new user
	Route::get('/register', 'RegistrationController@create');

	// Validate the form and create the new user
	Route::post('/register', 'RegistrationController@store');

	// Edit a ticket
	Route::get('/tickets/edit/{id}', 'TicketsController@edit');

	// Update existing ticket
	Route::post('/tickets/edit/{id}', 'TicketsController@update');

	// Delete existing ticket
	Route::delete('/tickets/delete/{id}', 'TicketsController@destroy');

	// View selected user tickets
	Route::get('/user/{id}/tickets', 'UserTicketsController@adminIndex');

});

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
{
	//Load ticket creation page
	Route::get('/tickets/new', 'TicketsController@create');

	// Submit a new ticket
	Route::post('/tickets', 'TicketsController@store');

	// View selected user tickets
	Route::get('/user/tickets', 'UserTicketsController@index');

	// edit user ticket
	Route::get('/user/ticket/{id}', 'UserTicketsController@edit');

	// update user ticket
	Route::post('/user/ticket/{id}', 'UserTicketsController@update');

	// Edit your user profile
	Route::get('/profile', 'UserProfileController@index');

	// Update your user profile
	Route::post('/profile', 'UserProfileController@update');
});

// Load login page and display form to crete a new session
Route::get('/login', 'SessionsController@create')->name('login');

// Log in user
Route::post('/login', 'SessionsController@store');

// Log out user
Route::get('/logout', 'SessionsController@destroy');

// password reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');





