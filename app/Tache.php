<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = ['nom', 'description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
