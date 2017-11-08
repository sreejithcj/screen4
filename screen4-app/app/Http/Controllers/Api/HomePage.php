<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;
use DB;
use Illuminate\Support\Facades\Log;

class HomePage extends Controller
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

    public function sliders()
    {
        $videos = Models\Videos:: select('id','largeImage')
                ->whereIn('id', Models\HomePageSliders::select('videoId')->get()->toArray())
                ->get();
        return response()->json($videos);
    }

    public function home_videos()
    {
        $categories = DB::table("home_page_categories")
                ->join("categories", "home_page_categories.categoryId", "=", "categories.id")
                ->select("home_page_categories.categoryId", "categories.category")
                ->get();
        $allVideos = array();
        foreach ($categories as $category) {            
            $videos = DB::table("videos")
                    ->select("id","title", "image")
                    ->where("categoryId", "=", $category->categoryId)
                    ->orderBy('created_at','desc')->take(4)
                    ->get();            
            
            $homeVideos = array();
            $homeVideos ["name"] = $category->category;
            $homeVideos ["id"] = $category->categoryId;
            $homeVideos ["items"] = $videos ;
            array_push($allVideos,$homeVideos);
        }
        return response()->json($allVideos);
    }
}