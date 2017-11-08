<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;
use Illuminate\Support\Facades\Log;


class CategoryPage extends Controller
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
        return response()->json('Hello');
    }
    
    public function category_videos (Request $request, $id,$limit){        
        $videos = Models\Videos:: select("id","title","image","brief")
                ->where('categoryId', "=", $id )
                ->jsonPaginate();            
        return response()->json($videos);    
    }
    
    public function category_title (Request $request, $id){
        $category = Models\Categories:: select("category")
                ->where('id', "=", $id)
                ->get();            
        return response()->json($category); 
    }    
}