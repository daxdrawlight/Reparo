<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	protected $fillable = ['ticket_id'];
	protected $guarded = ['user_id'];
}