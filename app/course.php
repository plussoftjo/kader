<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
	public $with = ['trainers','course_sections','course_reqs'];
    protected $fillable = [
        'trainers_id','litleDes','fullDes','price','title','image','loop','catg_id'
    ];

    public function trainers() {
    	return $this->belongsTo('App\trainers');
    }

    public function course_reqs() {
    	return $this->hasMany('App\course_req');
    }
    public function course_sections() {
    	return $this->hasMany('App\course_section');
    }

    public function pays() {
        return $this->hasMany('App\pay');
    }
}
