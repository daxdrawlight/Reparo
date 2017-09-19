<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Ticket;
use App\TicketStatus;
use App\TicketWorkRecord;
use App\TicketPartRecord;
use PDF;
use Mail;
use App\Mail\NewTicket;
use App\Mail\UpdateTicket;
use Auth;

class UserTicketsController extends Controller
{
    public function index(){

        if(auth()->user()->role_id == 2){
            $id = auth()->user()->id;
        }

    	$tickets = User::find($id)->tickets()->latest()->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')->join('users', 'tickets.user_id', '=', 'users.id')->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname')->simplePaginate(15);

    		return view('tickets.index', compact('tickets'));
    }

    public function adminIndex($id){

        $tickets = User::find($id)->tickets()->latest()->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')->join('users', 'tickets.user_id', '=', 'users.id')->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname')->simplePaginate(15);

            return view('tickets.index', compact('tickets'));
    }

    public function edit($id){

    	// get the ticket data from the database

        $ticket         = Ticket::where('serial', $id)->first();
        $ticket_works   = TicketWorkRecord::where('ticket_id', $id)->first();
        $ticket_parts   = TicketPartRecord::where('ticket_id', $id)->first();
        $author         = User::where('id', $ticket->user_id)->first();

        // unserialize the ticket work data

        $works = unserialize($ticket_works->description);
        $hours = unserialize($ticket_works->hours);
        $pphs = unserialize($ticket_works->price);
        $work_totals = unserialize($ticket_works->total);

        // add work cost to the total ticket cost

        $ukupno = 0;
        if(!empty($work_totals))
        {
            foreach($work_totals as $total){
                    $ukupno += $total;
                }
        }
        if($ukupno == 0){
        	$provizija = 0;
        }
        else{
        	$provizija = $ukupno * 0.20;
        }

        // get all ticket statuses from the database

        $statuses = TicketStatus::all();

        // load the ticket edit view and pass it all of the data
        if(auth()->user()->id == $author->id){
        	return view('dashboard.users.ticket.edit', compact('ticket', 'works', 'hours', 'pphs', 'work_totals', 'parts', 'serial', 'prices', 'ukupno', 'statuses', 'author', 'provizija'));
    	}
    	else{
    		return redirect()->back();
    	}
    }

    public function update($id){
    	$this->validate(request(), [
            'name'      => 'required',
            'email'     => 'required_without:phone|sometimes|nullable|email',
            'device'    => 'required',
            'issue'     => 'required',
            'phone'     => 'required_without:email',
            ]);

        Ticket::where('serial', $id)->update([
            'client_name'       => request('name'),
            'client_address'    => request('address'),
            'client_phone'      => request('phone'),
            'client_email'      => request('email'),
            'client_device'     => request('device'),
            'device_issue'      => request('issue'),
            'device_note'       => request('note'),
            ]);
        
            return redirect()->back();
    }
}
