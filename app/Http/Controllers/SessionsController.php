<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	// Attempt to authenticate user
    	if (! auth()->attempt(request(['email', 'password'])))
    	{
    		return back()->withErrors([
    			'message' => 'Provjerite da li su uneseni podaci točni'
    			]);
    	}

    	// Redirect to the home page
    	return redirect('/tickets/new');

    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
