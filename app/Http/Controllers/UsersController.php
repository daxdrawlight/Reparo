<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
    	$users = User::latest()->join('user_roles', 'users.role_id', '=', 'user_roles.id')->select('users.*', 'user_roles.name as role')->get();
    	return view('dashboard.users.index', compact('users'));
    }
}
