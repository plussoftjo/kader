<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\trainers;
use App\trainers_degree;
use Image;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Auth; 
class trainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(trainers::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->trainer, [ 
            'name' => 'required',
            'des' => 'required',
            'image' => 'required|image64:jpeg,jpg,png',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $imageData = $request->get('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        Image::make($request->get('image'))->resize(600,600)->save(public_path('images/trainers/').$fileName);


        $trainers = trainers::create([
            'name' => $request->trainer['name'],
            'des' => $request->trainer['des'],
            'image' => 'images/trainers/'.$fileName
        ]);

        foreach ($request->degrees as $d) {
            trainers_degree::create([
                'text' => $d['text'],
                'trainers_id' => $trainers->id
            ]);
        }

        $result = trainers::where('id',$trainers->id)->first();

        return response()->json($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'name' => 'required',
            'des' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        trainers::where('id',$id)->update([
            'name' => $request->name,
            'des' => $request->des
        ]);

        foreach ($request->trainers_degrees as $d) {
            if(!$d['new']) {
               trainers_degree::where('id',$d['id'])->update([
                    'text' => $d['text']
                ]);  
            }else {
               trainers_degree::create([
                    'text' => $d['text'],
                    'trainers_id' => $request->id
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
        Image::make($request->get('image'))->resize(600,600)->save(public_path('images/trainers/').$fileName);

        trainers::where('id',$id)->update([
            'image' => 'images/trainers/'.$fileName
        ]);

        return response()->json(['image' => 'images/trainers/'.$fileName]);

    }

    public function destroyDegree($id) {
        trainers_degree::where('id',$id)->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        trainers::where('id',$id)->delete();
        trainers_degree::where('trainers_id',$id)->delete();
    }
}
