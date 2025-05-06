<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel as blog;
use App\Models\Category ;
use App\Models\Advertisement ;

class WelcomeController extends Controller
{
    public function index(){
        $select = blog::where("status",1)->latest()->limit(6)->get();
        $category = Category::withCount(['posts' => function($query) {
            $query->where('status', 1);
        }])->latest()->get();
        $mainBanner = Blog::where("status",1)->where("is_banner",1)->first(); 
        $secondBanner = Blog::where("status",1)->where("is_banner",2)->first(); 
        $therdBanner = Blog::where("status",1)->where("is_banner",3)->first(); 
        $latestPost = blog::where("status",1)->latest()->limit(8)->get();

        $advertisments = Advertisement::where("status",1)->inRandomOrder()->first();
 
        return \view("index",\compact("select","category","latestPost","mainBanner","secondBanner","therdBanner","advertisments"));
    }
}
