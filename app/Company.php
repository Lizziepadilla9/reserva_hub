<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company', 'representative', 'email', 'telephone', 'users_id'];
    public function user()
    {
     	
     	return $this->belongsTo('App\User');


     	}
}
