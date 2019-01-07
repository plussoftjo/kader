<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth; 
class userController extends Controller
{
   	public function store(Request $request) {
   		$validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'age' => 'required',
            'password' => 'required'
           
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $user = User::create([
        	'name' => $request->name,
        	'email'=> $request->email,
        	'phone' => $request->phone,
        	'age' => $request->age,
        	'password' => bcrypt($request->password)
        ]);
   	}

    public function login(Request $req)
    {
        $user = new User;
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
        // Authentication passed...
            return response()->json(['msg' => '1']);
        }else {
            return response()->json(['msg' => '2'],401);
            
        }
    }

    public function user_auth()
    {
        if(Auth::check())
        {
            return response()->json(['user' => Auth::User(),'auth' => true]);
        }else {
            return response()->json(['auth' => false]);
        }
    }

    public function logout() {
        Auth::logout();
    }

}
