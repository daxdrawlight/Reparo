<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	'role_id'	=> 1,
        	'name'		=> 'admin',
        	'email'		=> 'admin@email.com',
        	'password'	=> bcrypt('123456')
        	]);
    }
}
