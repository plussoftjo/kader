<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pay;
use Illuminate\Support\Facades\Auth; 
use App\pay_bank;
class payController extends Controller
{
    public function store(Request $request,$id)
    {
    	$payx = pay::create([
    		'user_id' => Auth::id(),
    		'course_id' => $id,
    		'pay_type' => $request->type
    	]);


    	if($request->type)
    	{
    		$pay = $request->pay;
    		$pay_bank = pay_bank::create([
    			'country' => $pay['country'],
    			'fullName' => $pay['fullName'],
    			'account_number' => $pay['account_number'],
    			'bank_name' => $pay['bank_name'],
    			'note' => $pay['note'],
    			'pay_id' => $payx->id
    		]);
    	}
    } 
}
