<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Tache extends Model
{
    protected $fillable = ['nom', 'description'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
