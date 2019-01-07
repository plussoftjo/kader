<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay extends Model
{
	public $with = ['user','course','pay_banks'];
    protected $fillable = ['user_id','pay_type','course_id','state'];

   public function user() {
   	return $this->belongsTo('App\User');
   } 
   public function course() {
   	return $this->belongsTo('App\course');
   } 
   public function pay_banks() {
   	return $this->hasOne('App\pay_bank');
   }
}
