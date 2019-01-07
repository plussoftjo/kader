<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay_bank extends Model
{
    protected $fillable = ['country','pay_id','account_number','bank_name','note','fullName'];

     public function pays() {
   		return $this->belongsTo('App\pay');
   } 
}
