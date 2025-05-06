<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\PostModel as blog;

class termsController extends Controller
{
    public function index(){
        
        $term = DB::table("terms_of_service")->first();
        $latestPost = blog::latest()->limit(10)->get();
        return \view("front.layout.pages.terms",\compact("term","latestPost"));
    }
}
