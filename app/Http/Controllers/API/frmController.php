<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\frm;
class frmController extends Controller
{
    public function store(Request $request)
    {
    	$frm = frm::create($request->all());
    	return response()->json($frm);
    } 
}
