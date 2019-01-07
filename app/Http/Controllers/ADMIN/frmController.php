<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\frm;
class frmController extends Controller
{
    public function index() {
    	return response()->json(frm::orderBy('id','desc')->get());
    }

    public function approve($id) {
    	frm::where('id',$id)->update([
    		'state' => 1
    	]);
    }
}
