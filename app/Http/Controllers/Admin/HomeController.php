<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostModel;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index(){
        $Totalcategories = Category::all()->count();
        $Totalpost = PostModel::all()->count();
        $penddingPost = PostModel::where("status",0)->count();
        $publistPost = PostModel::where("status",1)->count();
        $latestPost = PostModel::where("status",1)->latest()->get();
        $latestCategories = Category::latest()->get();
        return view('admin.home',\compact("Totalcategories","Totalpost","penddingPost","publistPost","latestPost","latestCategories"));
    }
}
