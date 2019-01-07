<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pay;
class payController extends Controller
{
    public function index() {
    	return response()->json(pay::orderBy('id','desc')->get());
    }

    public function approve($id) {
    	$approve = pay::where('id',$id)->update([
    		'state' => 1
    	]);
    }
}
