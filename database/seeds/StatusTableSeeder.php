<?php

use Illuminate\Database\Seeder;
use App\TicketStatus;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketStatus::insert([
        	[
                'status' => 'Zaprimljen',
                'icon' => 'fiber_new'
            ],
            [
                'status' => 'Pregledan',
                'icon' => 'remove_red_eye'
            ],
            [
                'status' => 'Čekaju se dijelovi',
                'icon' => 'access_time'
            ],
            [
                'status' => 'Završen',
                'icon' => 'check'
            ]
        	]);
    }
}
