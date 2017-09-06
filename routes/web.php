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
Route::get('/', function () {
    return view('index');
})->name('home');

// Load register page and display form to crete a new user
Route::get('/register', 'RegistrationController@create');

// Validate the form and create the new user
Route::post('/register', 'RegistrationController@store');

// Load login page and display form to crete a new session
Route::get('/login', 'SessionsController@create');

// Log in user
Route::post('/login', 'SessionsController@store');

// Log out user
Route::get('/logout', 'SessionsController@destroy');

//Load the index view of the tickets page
Route::get('/tickets', 'TicketsController@index');

//Load ticket creation page
Route::get('/tickets/new', 'TicketsController@create');

// Submit a new ticket
Route::post('/tickets', 'TicketsController@store');

// Edit a ticket
Route::get('/tickets/edit/{id}', 'TicketsController@edit');

// Update existing ticket
Route::post('/tickets/edit/{id}', 'TicketsController@update');

// Delete existing ticket
Route::delete('/tickets/delete/{id}', 'TicketsController@destroy');





