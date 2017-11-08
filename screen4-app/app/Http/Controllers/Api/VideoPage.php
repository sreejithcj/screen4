<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;
use Illuminate\Support\Facades\Log;
use DB;

class VideoPage extends Controller
{
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
    
    public function video_attributes (Request $request, $id){
        $videos = DB::table("videos")
           ->join("genres", "videos.genreId", "=", "genres.id")
           ->select("videos.title", "videos.brief", "videos.year","videos.duration","videos.largeImage","videos.url","genres.genre")
           ->where("videos.id", "=" ,$id)
           ->get();
        return response()->json($videos); 
    }
    
    public function add_comment (Request $request, $videoId, $userId, $comment){
        
        try
        {
            Models\Comments:: insert([
                'videoId' => $videoId,              
                'userId'=>$userId,
                'comment'=>$comment,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }catch(Exception $ex)
        {
            return response()->json("FAILURE");
        }
        return response()->json("SUCCESS");
    }
    
    public function get_comments (Request $request, $videoId){  
        $comments = DB::table("comments")
           ->join("users", "comments.userId", "=", "users.id")
           ->select("comments.comment", "users.name", "comments.created_at")
           ->where("comments.videoId", "=" ,$videoId)
           ->orderBy("comments.created_at",'DSC')
           ->get();  
        return response()->json($comments); 
    }
}