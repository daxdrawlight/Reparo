<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Ticket;
use App\TicketStatus;
use App\TicketWorkRecord;
use App\TicketPartRecord;
use App\User;
use PDF;
use Mail;
use App\Mail\NewTicket;
use App\Mail\UpdateTicket;
use App\ExternalService;
use Auth;

class TicketsController extends Controller
{
    public function index()
    {
    	$tickets = Ticket::latest()->join('ticket_statuses', 'tickets.status', '=', 'ticket_statuses.id')->join('users', 'tickets.user_id', '=', 'users.id')->select('tickets.*', 'ticket_statuses.status', 'ticket_statuses.icon', 'users.name', 'users.fullname')->simplePaginate(15);
    	return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
    	return view('tickets.create');
    }

    public function store()
    {
        // TODO: CHECK IF THE GENERATED STRING IS UNIQUE AND DOES NOT EXIST
        $random = crc32(uniqid());
        $random_string = 'RN-'.str_shuffle($random);
        //$random_string = "RN-" . str_random(8);

        $user_id = \Auth::user()->id;

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
            'serial'            => $random_string,
            'user_id'           => $user_id
    		]);

        ExternalService::create([
            'ticket_id'         => $random_string    
        ]);

        TicketWorkRecord::create([
            'ticket_id'         => $random_string,
            'description'       => serialize(array()),
            'hours'             => serialize(array()),
            'price'             => serialize(array()),
            'total'             => serialize(array())
            ]);

        TicketPartRecord::create([
            'ticket_id'         => $random_string,
            'description'       => serialize(array()),
            'serial'            => serialize(array()),
            'price'             => serialize(array())
            ]);

        \Mail::to('computer.centar.servis@gmail.com')->send(new NewTicket($random_string));
        if(auth()->user()->role_id == 2){
            flash('Nalog kreiran');
            return redirect('/user/ticket/'.$random_string);
        }
        else{
            flash('Nalog kreiran');
    	   return redirect('/tickets/edit/'.$random_string);
        }   
    }

    public function edit($id){

        // get the ticket data from the database

        $ticket         = Ticket::where('serial', $id)->first();
        $ticket_works   = TicketWorkRecord::where('ticket_id', $id)->first();
        $ticket_parts   = TicketPartRecord::where('ticket_id', $id)->first();
        $author         = User::where('id', $ticket->user_id)->first();
        $outside        = ExternalService::where('ticket_id', $id)->first();

        // unserialize the ticket work data

        $works = unserialize($ticket_works->description);
        $hours = unserialize($ticket_works->hours);
        $pphs = unserialize($ticket_works->price);
        $work_totals = unserialize($ticket_works->total);

        // add work cost to the total ticket cost

        $ukupno = 0;
        $percent = $author->provision / 100;
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
            $provizija = $ukupno * $percent;
        }

        // unserialize the ticket parts data

        $parts = unserialize($ticket_parts->description);
        $serial = unserialize($ticket_parts->serial);
        $prices = unserialize($ticket_parts->price);

        // add part prices to the total ticket price

        if(isset($prices))
        {
            foreach($prices as $price){
                $ukupno += $price;
            }
        }

        // get all ticket statuses from the database

        $statuses = TicketStatus::all();

        // load the ticket edit view and pass it all of the data

        return view('tickets.edit', compact('ticket', 'works', 'hours', 'pphs', 'work_totals', 'parts', 'serial', 'prices', 'ukupno', 'statuses', 'author', 'provizija', 'outside'));
    }

    public function update($id){

        $this->validate(request(), [
            'name'      => 'required',
            'email'     => 'required_without:phone|sometimes|nullable|email',
            'device'    => 'required',
            'issue'     => 'required',
            'phone'     => 'required_without:email',
            ]);

        $work = Request::get('work');
        $hours = Request::get('hours');
        $pph = Request::get('pph');

        $part = Request::get('part');
        $serial = Request::get('serial');
        $price = Request::get('price'); 

        $single_work_total = array();
        $work_total = 0;
        $part_total = 0;
        $ticket_total = 0;

        if(isset($work))
        {
            foreach ($work as $key => $value) {
                $single_work_total[] = $hours[$key] * $pph[$key];
                $work_total += $hours[$key] * $pph[$key];
            }
        }

        if(isset($part))
        {
            foreach ($part as $key => $value) {
                    $part_total += $price[$key];
                }
        }

        $ticket_total = $work_total + $part_total;   
        $current_status = Ticket::select('status')->where('serial', $id)->first()->status;
        $new_status = Request::get('status');

        Ticket::where('serial', $id)->update([
            'client_name'       => request('name'),
            'client_address'    => request('address'),
            'client_phone'      => request('phone'),
            'client_email'      => request('email'),
            'client_device'     => request('device'),
            'device_issue'      => request('issue'),
            'device_note'       => request('note'),
            'status'            => request('status'),
            'work_total'        => $work_total,
            'total'             => $ticket_total,
            'device_diagnostic' => request('diagnostic')
            ]);
        
        if($current_status != $new_status && $new_status == 4){
            Ticket::where('serial', $id)->update([
                'finished_at'       => date('Y-m-d H:i:s')
            ]);
        }

        ExternalService::where('ticket_id', $id)->update([
            'name'          => request('outside'),
            'start'         => request('start'),
            'end'           => request('end')
        ]);

        TicketWorkRecord::where('ticket_id', $id)->update([
            'description' 		=> serialize($work),
            'hours'             => serialize($hours),
            'price'             => serialize($pph),
            'total'             => serialize($single_work_total)
		]);

        TicketPartRecord::where('ticket_id', $id)->update([
            'description'   => serialize($part),
            'serial'        => serialize($serial),
            'price'         => serialize($price)
        ]);

        if($current_status != $new_status){
            $status = TicketStatus::select('status')->where('id', request('status'))->first();

            $mail_data = ([
                'client_name'   => request('name'),
                'ticket'        => $id,
                'status'        => $status->status
                ]);
            if(!empty(request('email'))){
                \Mail::to(request('email'))->send(new UpdateTicket($mail_data));
            }
        }

        //session()->flash('message', 'Spremljeno.');

        flash('Izmjene spremljene');

        return redirect()->back();
    }

    public function destroy($id){
        Ticket::where('serial', $id)->delete();
        TicketWorkRecord::where('ticket_id', $id)->delete();
        TicketPartRecord::where('ticket_id', $id)->delete();

        flash('Nalog izbrisan');
        return redirect('/tickets');
    }

    public function makePdf($id){

        // get the ticket data from the database

        $ticket = Ticket::where('serial', $id)->first();
        $author = User::where('id', $ticket->user_id)->first();
        $ticket_works = TicketWorkRecord::where('ticket_id', $id)->first();
        $ticket_parts = TicketPartRecord::where('ticket_id', $id)->first();


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

        // unserialize the ticket parts data

        $parts = unserialize($ticket_parts->description);
        $serial = unserialize($ticket_parts->serial);
        $prices = unserialize($ticket_parts->price);

        // add part prices to the total ticket price

        if(isset($prices))
        {
            foreach($prices as $price){
                $ukupno += $price;
            }
        }

        $pdf = PDF::loadView('pdf.ticket', compact('ticket', 'works', 'hours', 'pphs', 'work_totals', 'parts', 'serial', 'prices', 'ukupno', 'author'))->setPaper('a4', 'portrait')->setOptions(['dpi' => 150, 'defaultFont' => 'Arial', 'isRemoteEnabled' => true]);
        return $pdf->download($id.'.pdf');
    }

    public function printPdf($id){

        // get the ticket data from the database

        $ticket = Ticket::where('serial', $id)->first();
        $author = User::where('id', $ticket->user_id)->first();
        $ticket_works = TicketWorkRecord::where('ticket_id', $id)->first();
        $ticket_parts = TicketPartRecord::where('ticket_id', $id)->first();

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

        // unserialize the ticket parts data

        $parts = unserialize($ticket_parts->description);
        $serial = unserialize($ticket_parts->serial);
        $prices = unserialize($ticket_parts->price);

        // add part prices to the total ticket price

        if(isset($prices))
        {
            foreach($prices as $price){
                $ukupno += $price;
            }
        }

        $pdf = PDF::loadView('pdf.ticket', compact('ticket', 'works', 'hours', 'pphs', 'work_totals', 'parts', 'serial', 'prices', 'ukupno', 'author'))->setPaper('a4', 'portrait')->setOptions(['dpi' => 150, 'defaultFont' => 'Arial', 'isRemoteEnabled' => true]);
        return $pdf->stream($id.".pdf", array("Attachment" => false));
    }
}
