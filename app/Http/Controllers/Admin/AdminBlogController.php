<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostModel;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminBlogController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("can:admin.blog-post.view")->only("blogs");
        $this->middleware("can:admin.blog-post.create")->only("blog_create");
        $this->middleware("can:admin.blog-post.edit")->only("edit");
        $this->middleware("can:admin.blog-post.delete")->only("delete");
    }

     
    public function blogs()
    {
        $select = PostModel::all(); 
        return \view("admin.blogs.index",\compact("select"));
    }
    public function blog_create()
    {
        $category = Category::all(); 
        $user = User::all();

        return \view("admin.blogs.blogCreate",\compact("category","user"));
    }
    public function store(Request $req){
        $req->validate([
            'posttitle' => 'required|string|max:255',          
            'postslug' => 'required|max:60',  
            'category_id' => 'required|integer',              
            'author' => 'required|integer',                    
            'desc' => 'required|string',                         
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',  
            'Poststatus' => 'required',  
        ]);
        $imageName = null;
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('front_end/assets/images/blog/'), $imageName);
        } 
        $slug = $req->postslug;
        $slugCheck = PostModel::where('slug',$slug)->count();
        if ($slugCheck>0) {
            $slug = $req->postslug."-".uniqid();
             
        }else{
            $slug = $req->postslug;
        } 
        $data =  PostModel::create([
            "title"=>$req->posttitle,
            "slug"=>$slug,
            "category_id"=>$req->category_id,
            "user_id"=>$req->author,
            "description"=>$req->desc,
            "img"=>$imageName,
            "status"=>$req->Poststatus 
        ]); 

        return \redirect()->route("admin.blog.create")->with("success","Data insert success");
}
    public function view($id){
        $select = PostModel::find($id);
        return \view("admin.blogs.view",\compact("select"));
    }
    public function delete($id){
        $delete = PostModel::find($id);
        if($delete->img){
            $imgPath = \public_path("front_end/assets/images/blog/".$delete->img);
            if(File::exists($imgPath)){
                File::delete($imgPath);
             }
        }else{
            return \redirect()->route("admin.blogs")->with("success","Flodare image neii");
            }
        if($delete->delete()){
            return \redirect()->route("admin.blogs")->with("success","Data delete success");
        }else{
            return \redirect()->route("admin.blogs")->with("success","Data delete success");

        } 
    }
    public function edit($id){ 
        $user = User::all();
        $select = PostModel::find($id);
        $categories = Category::all(); 
         
        return \view("admin.blogs.edit",\compact("select","categories","user"));
    }
    public function update(Request $req,$id){
        $update = PostModel::find($id);
        $update->title=$req->posttitle; 
        $update->category_id=$req->category_id;
        $update->description=$req->desc;
        $update->status=$req->upstatus;
        $data = PostModel::where("status",1)->where("is_banner",$req->main_banner)->first();
        if($data){
              $data->is_banner = 0; 
              $data->save();
        } 
        
        $update->is_banner=$req->main_banner;
        if($req->hasFile("img")){ 
            $oldImage = $update->img;
         
            $imgPath = $req->file("img");
            $imgName = time().".".$imgPath->getClientOriginalExtension();
            $imgPath->move(public_path("front_end/assets/images/blog/"), $imgName);
            $update->img = $imgName;
         
            if($oldImage){
                $oldPath = public_path("front_end/assets/images/blog/" . $oldImage);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }
        }
        if($update->save()){
            return \redirect()->route("admin.blogs");
        }else{
            echo "update failed";
        }
        
    }
    public function filter(Request $req){
        $filterValue = $req->post__filter;
        if($filterValue === "0" || $filterValue === "1"){
            $select = PostModel::where("status",$filterValue)->get(); 
        }elseif($filterValue==="all"){
            $select = PostModel::get(); 
        }else{
            $select = PostModel::get(); 
        } ;

        return \view("admin.blogs.index",\compact("select"));
    }
}