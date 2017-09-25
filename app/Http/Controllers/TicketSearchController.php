<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ticket;

class TicketSearchController extends Controller
{
    public function index(){

    	$query = Input::get('search');

    			$client = Ticket::where('client_name', 'like', "%{$query}%")
	    			->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
	    			->join('users', 'tickets.user_id', '=', 'users.id')
	    			->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname');
    			$address = Ticket::where('client_address', 'like', "%{$query}%")
	    			->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
	    			->join('users', 'tickets.user_id', '=', 'users.id')
	    			->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname');
    			$phone = Ticket::where('client_phone', 'like', "%{$query}%")
	    			->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
	    			->join('users', 'tickets.user_id', '=', 'users.id')
	    			->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname');
    			$email = Ticket::where('client_email', 'like', "%{$query}%")
	    			->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
	    			->join('users', 'tickets.user_id', '=', 'users.id')
	    			->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname');
    			$device = Ticket::where('client_device', 'like', "%{$query}%")
	    			->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
	    			->join('users', 'tickets.user_id', '=', 'users.id')
	    			->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname');
    			$issue = Ticket::where('device_issue', 'like', "%{$query}%")
	    			->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
	    			->join('users', 'tickets.user_id', '=', 'users.id')
	    			->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname');

    			$tickets = Ticket::where('serial', 'like', "%{$query}%")
    				->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')
    				->join('users', 'tickets.user_id', '=', 'users.id')
    				->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname')
    				->union($client)
    				->union($address)
    				->union($phone)
    				->union($email)
    				->union($device)
    				->union($issue)
    				->latest()
    				->simplePaginate(0);

    		return view('tickets.index', compact('tickets', 'query'));
    }

}
