<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\catg;
use App\trainers;
use App\course;
class mainController extends Controller
{
    public function catgs() {
    	return response()->json(catg::get());
    }

    public function courses_withcatg($id) 
    {
    	return response()->json(course::where('catg_id',$id)->take(3)->get());
    }

    public function showCourse($id) 
    {
    	return response()->json(course::where('id',$id)->firstOrFail());
    }

    public function catg_page() 
    {
        $catg = catg::get();
        $first_catg = catg::firstOrFail();
        $first_course = course::where('catg_id',$first_catg->id)->first();
        $randome_course = course::where('catg_id',$first_catg->id)->take(3)->inRandomOrder()->get();
        $top_course = course::where('catg_id',$first_catg->id)->take(3)->inRandomOrder()->get();
        $trainers = trainers::take(4)->get();

        return response()->json(['catg' => $catg, 'randome_course'=> $randome_course,'top_course' => $top_course,'active' => $first_catg->id,'first_course' => $first_course,'catg_name' => $first_catg->name,'trainers' => $trainers]);
    } 

    public function change_catg($id)
    {
    $randome_course = course::where('catg_id',$id)->take(3)->inRandomOrder()->get();
    $top_course = course::where('catg_id',$id)->take(3)->inRandomOrder()->get();
    $first_course = course::where('catg_id',$id)->first();
    return response()->json([ 'randome_course'=> $randome_course,'top_course' => $top_course,'first_course' => $first_course]);

    }
}
