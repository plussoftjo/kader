<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainers extends Model
{

	public $with = ['trainers_degrees'];
    protected $fillable = [
        'name','des','image'
    ];

    public function trainers_degrees() {
        return $this->hasMany('App\trainers_degree');
    }
    public function courses() {
        return $this->hasMany('App\course');
    }
}
