<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserProfileController extends Controller
{
    public function index(){
    	$id = auth()->user()->id;
    	$user = User::where('id', $id)->first();
    	return view('dashboard.users.profile', compact('user'));
    }

    public function update(){
    	$id = auth()->user()->id;
    	
    	$this->validate(request(), [
            'email'     => 'required|email',
            ]);

    	User::where('id', $id)->update([
            'email'    		=> request('email'),
            'fullname'      => request('fullname'),
            'address'      	=> request('address'),
            'phone'     	=> request('phone')
            ]);

    	return redirect()->back();
    }
}
