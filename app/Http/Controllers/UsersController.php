<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;

class UsersController extends Controller
{
    public function index(){
    	$users = User::latest()->join('user_roles', 'users.role_id', '=', 'user_roles.id')->select('users.*', 'user_roles.name as role')->get();
    	return view('dashboard.users.index', compact('users'));
    }

    public function edit($id){
    	$user = User::where('id', $id)->first();
    	$roles = UserRole::all();
    	return view('dashboard.users.edit', compact('user', 'roles'));
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
            'role_id'      	=> $role
            ]);

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
        return redirect('/dashboard/users');
    }
}
