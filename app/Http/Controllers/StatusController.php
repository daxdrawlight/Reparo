<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;
use App\TicketStatus;

class StatusController extends Controller
{
    public function index(){
    	return view('status.index');
    }

    public function create(){

    	$serial = request('serial');
    	$ticket = Ticket::where('serial', $serial)->first();
    	$author = User::where('id', $ticket->user_id)->first();
    	$statuses = TicketStatus::all();
    	return view('status.ticket', compact('ticket', 'author', 'statuses'));
    }

    public function check($id){
    	$serial = $id;
    	$ticket = Ticket::where('serial', $serial)->first();
    	$author = User::where('id', $ticket->user_id)->first();
    	$statuses = TicketStatus::all();
    	return view('status.ticket', compact('ticket', 'author', 'statuses'));
    }
}
