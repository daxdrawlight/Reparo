<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Ticket;
use App\TicketStatus;
use App\TicketWorkRecord;

class TicketsController extends Controller
{
    public function index()
    {
    	$tickets = Ticket::latest()->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon')->get();
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
    		'name'    	=> 'required',
    		'email'   	=> 'required_without:phone|sometimes|nullable|email',
    		'device'  	=> 'required',
    		'issue'   	=> 'required',
    		'phone'		=> 'required_without:email',
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

        TicketWorkRecord::create([
            'ticket_id'         => $random_string
            ]);

    	return redirect('/tickets');
    }

    public function edit($id){
        $ticket = Ticket::where('serial', $id)->first();
        $works = TicketWorkRecord::where('ticket_id', $id)->first();
        $work = unserialize($works->description);
        $hour = unserialize($works->hours);
        $pph = unserialize($works->price);
        $statuses = TicketStatus::all();
        return view('tickets.edit', compact('ticket', 'work', 'hour', 'pph', 'statuses'));
    }

    public function update($id){
        Ticket::where('serial', $id)->update([
            'client_name'       => request('name'),
            'client_address'    => request('address'),
            'client_phone'      => request('phone'),
            'client_email'      => request('email'),
            'client_device'     => request('device'),
            'device_issue'      => request('issue'),
            'device_note'       => request('note'),
            'status'            => request('status')
            ]);

        $work = serialize(Request::get('work'));
        $hours = serialize(Request::get('hours'));
        $pph = serialize(Request::get('pph'));
        TicketWorkRecord::where('ticket_id', $id)->update([
            'description' 		=> $work,
            'hours'             => $hours,
            'price'             => $pph,
            'ticket_id' 		=> $id
		]);       

        return redirect('/tickets');
    }
}
