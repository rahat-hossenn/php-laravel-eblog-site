<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\PostModel as blog;

class PrivacyController extends Controller
{
    public function index(){
        $privacy = DB::table("privacy_policy")->first();
        $latestPost = blog::latest()->limit(10)->get();
        return \view("front.layout.pages.privacy",\compact("privacy","latestPost"));
    }
}
