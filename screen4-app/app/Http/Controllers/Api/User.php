<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;
use DB;
use Illuminate\Support\Facades\Log;

class User extends Controller
{

    private $homeVideos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        return response()->json('Hello');
    }

    public function signup(Request $request,$name,$email,$password)
    {
        Log::info('Insite signup api');
        $user = DB::table('users')
                ->select('id')
                ->where('email', $email)
                ->get();
        if(count($user) != 0)
        {
            return response()->json("TAKEN");
        }
        else
        {
            DB::table('users')->insert([
                'name' => $name,
                'email'=>$email,
                'password'=>$password,
                'api_token'=>str_random(60)
            ]);
            return response()->json("SUCCESS");
        }        
    }

    public function signin(Request $request,$email,$password)
    {
        $user = DB::table("users")
                ->select('id','name','email')
                ->where('email','=',$email)
                ->where('password', '=', $password)
                ->get();
        if(count($user) != 0)
        {
            return response()->json($user);
        }
        else
        {
            return response()->json("FAILURE");
        }
    }
}