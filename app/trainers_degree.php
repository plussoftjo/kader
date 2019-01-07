<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainers_degree extends Model
{
    protected $fillable = [
        'trainers_id','text'
    ];

     public function trainers() {
    	return $this->belongsTo('App\trainers');
    }
}
