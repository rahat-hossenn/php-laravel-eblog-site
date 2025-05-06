<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostModel;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("can:admin.blog-category.view")->only("categorys"); 
        $this->middleware("can:admin.blog-category.create")->only("create"); 
        $this->middleware("can:admin.blog-category.edit")->only("edit"); 
        $this->middleware("can:admin.blog-category.delete")->only("delete"); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categorys(){
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->post_count = PostModel::where('category_id', $category->id)->count();
        }
         
    
        return \view("admin.category.category",\compact("categories"));
    }
    public function create()
    {
        return \view("admin.category.crate");
    }
    public function view($id){ 
         $category = Category::find($id);
        return \view("admin.category.view",\compact("category"));
    }
    public function delete($id){
        $delete = Category::find($id);
        if($delete->delete()){
            $postDelte = PostModel::where("category_id",$id);
            $postDelte->delete();
            return \redirect()->route('admin.categorys')->with("success","Category delete success");
        }else{
            return \redirect()->route('admin.categorys')->with("success","Category delete failed");
        }
    }
    public function edit($id){
        $select = Category::find($id);
        return \view("admin.category.edit",\compact("select"));
    }
    public function update(Request $req,$id){
        $category = Category::find($id); 
        if($category->title==$req->categoryName){
            return \redirect()->route("admin.categorys")->with("success","This is Old category ");
        }else{
            $category->title=$req->categoryName;
            $category->slug=$req->categorySlug;
            if($category->save()){
                return \redirect()->route("admin.categorys")->with("success","Category update success");
            }else{
                return \redirect()->route("admin.categorys")->with("success","Category update failed");
            }
        }
    } 
    public function store(Request $req){
        $req->validate([
            'categoryName' => 'required|string|max:255|unique:categories,title',   
            'categorySlug' => 'nullable|string|max:255|unique:categories,slug',   
        ]);
        $category = new Category();
        $category->title=$req->categoryName;
        $category->slug=$req->categorySlug; 

        if($category->save()){
            return \redirect()->route("admin.categorys")->with("success","Category Insert success");
        }else{
            return \redirect()->route("admin.categorys")->with("success","Category Insert failed");
        }
    }
}
