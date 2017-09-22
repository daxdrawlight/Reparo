<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Ticket;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index(){
    	$users = User::latest()->join('user_roles', 'users.role_id', '=', 'user_roles.id')->select('users.*', 'user_roles.name as role')->get();
    	return view('dashboard.users.index', compact('users'));
    }

    public function edit($id){
    	$user = User::where('id', $id)->first();
    	$roles = UserRole::all();
        $percent = $user->provision / 100;

        $tickets = Ticket::where('user_id', $id)->get();
        $tickets = $tickets->sortByDesc('finished_at');
        $tickets = $tickets->groupBy(function($item){
            return Carbon::parse($item->finished_at)->format('m.Y');
        });
        $month_totals = array();
        $grand_total = 0;
        foreach ($tickets as $month => $ticket){
            foreach($ticket as $value => $total){
                $grand_total += $tickets[$month][$value]->work_total;
            }
            $month_totals[$month] = $grand_total * $percent;
            $grand_total = 0;
        }
    	return view('dashboard.users.edit', compact('user', 'roles', 'month_totals'));
    }

    public function update($id){

    	$this->validate(request(), [
            'email'     => 'required|email',
            ]);
    	if($id == 1){
    		$role = 1;
    	}
    	else{
    		$role = request('role');
    	}

    	User::where('id', $id)->update([
            'email'    		=> request('email'),
            'fullname'      => request('fullname'),
            'address'      	=> request('address'),
            'phone'     	=> request('phone'),
            'role_id'      	=> $role,
            'provision'     => request('provision')
            ]);
        flash('Izmjene spremljene');
    	return redirect()->back();
    }

    public function destroy($id){
    	$user_role = User::where('id', $id)->first()->role_id;
    	if($user_role == 1 || $id == 1){
    		return back()->withErrors([
    			'message' => 'Nije moguće brisanje korisnika koji je administrator.'
    			]);
    	}
        User::where('id', $id)->delete();
        flash('Korisnik obrisan');
        return redirect('/users');
    }
}
