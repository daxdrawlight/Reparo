<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    public function index()
    {
    	$tickets = Ticket::all();
    	return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
    	return view('tickets.create');
    }

    public function store()
    {
        // TODO: CHECK IF THE GENERATED STRING IS UNIQUE AND DOES NOT EXIST
        $random_string = "RN-" . str_random(8);

    	$this->validate(request(), [
    		'name'    => 'required',
    		'email'   => 'email',
    		'device'  => 'required',
    		'issue'   => 'required'
    		]);

    	Ticket::create([
    		'client_name' 		=> request('name'),
    		'client_address' 	=> request('address'),
    		'client_phone'		=> request('phone'),
    		'client_email'		=> request('email'),
    		'client_device'		=> request('device'),
    		'device_issue'		=> request('issue'),
    		'device_note'		=> request('note'),
    		'status'			=> 1,
            'serial'            => $random_string
    		]);

    	return redirect('/tickets');
    }
}
