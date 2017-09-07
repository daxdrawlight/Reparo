<?php

namespace App;

class Ticket extends Model
{
	public function user(){
		return $this->belongsTo(User::class);
	}    
}
