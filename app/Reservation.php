<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     protected $fillable = ['start_date', 'end_date', 'start_time', 'end_time', 'id_companies'];

 public function company()
{
	return $this->belongsTo('App\Company');
	

}

}
