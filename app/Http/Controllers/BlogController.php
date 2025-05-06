<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\PostModel as blog;
use App\Models\PostModel;
use App\Models\Advertisement;
class BlogController extends Controller
{
    public function search(Request $req){
        $req->validate([
            'query' => 'nullable|string|max:255'
        ]);
        $select = blog::where("status",1)->where("title","LIKE","%".$req->input('query')."%")
        ->orWhere("description","LIKE","%".$req->input('query')."%")->paginate(6);
        
        $category = Category::latest()->get();
        $latestPost = blog::where("status",1)->latest()->limit(8)->get();
        return \view("front.layout.pages.search",compact("select","category","latestPost"));
    }
    public function index(Request $req){
        // $select = blog::paginate(4);
        // search ing 
        $req->validate([
            'query' => 'nullable|string|max:255'
        ]);
        $select = blog::where("status",1)->paginate(4);
        //   ->where("title","LIKE","%".$req->input('query')."%")
        // ->orWhere("description","LIKE","%".$req->input('query')."%")
        
        $category = Category::withCount(['posts' => function($query) {
            $query->where('status', 1);
        }])->latest()->get();
    
        $latestPost = blog::where("status",1)->latest()->limit(8)->get();
        $advertisments = Advertisement::where("status",1)->inRandomOrder()->first();
        return \view("front.layout.pages.blog",\compact("select","category","latestPost","advertisments"));
    }
    public function blogShow($slug){
        $select = blog::where("status",1)->where("slug",$slug)->first();
        if ($select) {
            $select->views += 1;
            $select->save();
        }
        $raletedPost =  blog::where("status",1)->where("category_id",$select->category_id)->where("id","!=",$select->id)->limit(3)->get();
        $category = Category::withCount(['posts' => function($query) {
            $query->where('status', 1);
        }])->latest()->get();
    
        $latestPost = blog::where("status",1)->latest()->limit(8)->get();
        $advertisments = Advertisement::where("status",1)->inRandomOrder()->first();

        return \view("front.layout.pages.blogShow",\compact("select","category","latestPost","raletedPost","advertisments"));
    } 
    public function categoryShow($slug)
{ 
    $category_id = DB::table("categories")->where("slug", $slug)->first();

    if (!$category_id) {
        abort(404) ;
    }
 
    $select = blog::where("category_id", $category_id->id)
                    ->where("status", 1)
                    ->latest()
                    ->get();
 
    $latestPost = blog::where("status", 1)
                        ->latest()
                        ->limit(8)
                        ->get();
 
    $category = Category::withCount(['posts' => function($query) {
        $query->where('status', 1);
    }])->latest()->get();
 
    return view("front.layout.category.categoryShow", compact("select", "category", "latestPost"));
}

    // public function search(Request $req){
    //     $
    // }
}
