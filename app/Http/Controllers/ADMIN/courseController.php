<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\course;
use App\course_req;
use App\course_section;
use Image;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Auth; 
class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(course::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required',
            'litleDes' => 'required',
            'price' => 'required',
            'loop' => 'required',
            'price' => 'required',
            'fullDes' => 'required',
            'trainer' => 'required',
            'image' => 'required|image64:jpeg,jpg,png',
            'catg_id' => 'required'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $imageData = $request->get('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        Image::make($request->get('image'))->resize(600,600)->save(public_path('images/courses/').$fileName);

        $course = course::create([
            'title' => $request->title,
            'litleDes' => $request->litleDes,
            'price' => $request->price,
            'loop' => $request->loop,
            'fullDes' => $request->fullDes,
            'trainers_id' => $request->trainer,
            'image' => 'images/courses/'.$fileName,
            'catg_id' => $request->catg_id
        ]);

        foreach ($request->sections as $s) {
            if($s['title'] != '')
            {
             course_section::create([
                    'title' => $s['title'],
                    'course_id' => $course->id
                ]);   
            }
        }

        foreach ($request->reqs as $r) {
            if($r['title'] != '') {
             course_req::create([
                'course_id' => $course->id,
                'title' => $r['title']
             ]);   
            }
        }

        return response()->json($course);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(course::where('id',$id)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [ 
            'title' => 'required',
            'litleDes' => 'required',
            'price' => 'required',
            'loop' => 'required',
            'price' => 'required',
            'fullDes' => 'required',
            'trainers_id' => 'required',
            'catg_id' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $course = course::where('id',$id)->update([
            'title' => $request->title,
            'litleDes' => $request->litleDes,
            'price' => $request->price,
            'loop' => $request->loop,
            'fullDes' => $request->fullDes,
            'trainers_id' => $request->trainers_id,
            'catg_id' => $request->catg_id
        ]);

        foreach ($request->course_reqs as $cr) {
            if($cr['isNew']) {
               if($cr['title'] != ''){
                course_req::create([
                    'title' => $cr['title'],
                    'course_id' => $id
                ]);
               } 
            }else {
                course_req::where('id',$cr['id'])->update([
                    'title' => $cr['title']
                ]);
            }
        }

        foreach ($request->course_sections as $cr) {
            if($cr['isNew']) {
               if($cr['title'] != ''){
                course_section::create([
                    'title' => $cr['title'],
                    'course_id' => $id
                ]);
               } 
            }else {
                course_section::where('id',$cr['id'])->update([
                    'title' => $cr['title']
                ]);
            }
        }

    }

    public function updateImage(Request $request,$id) {
         $validator = Validator::make($request->all(), [ 
            'image' => 'required|image64:jpeg,jpg,png',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $imageData = $request->get('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        Image::make($request->get('image'))->resize(600,600)->save(public_path('images/courses/').$fileName);

        course::where('id',$id)->update([
            'image' => 'images/courses/'.$fileName
        ]);

        return response()->json(['image' => 'images/courses/'.$fileName]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        course::where('id',$id)->delete();
        course_req::where('course_id',$id)->delete();
        course_section::where('course_id',$id)->delete();
    }

    public function destroyReq($id)
    {
        course_req::where('id',$id)->delete();
    }
    public function destroySection($id)
    {
        course_section::where('id',$id)->delete();
    }
}
