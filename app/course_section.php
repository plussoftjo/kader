<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_section extends Model
{
    protected $fillable = ['course_id','title'];

    public function course() {
    	return $this->belongsTo('App\course');
    }
}
