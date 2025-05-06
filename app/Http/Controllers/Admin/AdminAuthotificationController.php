<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostModel;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminAuthotificationController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.user.view')->only("index");
        $this->middleware('can:admin.user.create')->only("create");
        $this->middleware('can:admin.user.edit')->only("store");
        $this->middleware('can:admin.user.delete')->only("delete");

    }
  
    public function index(){
        $users = User::all(); 
        return \view("admin.users.index",\compact("users"));
    }

    public function create() {
        $data = Role::latest()->get(); 
        return \view("admin.users.create",compact("data"));
    }

    public function store(Request $req){
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer',
            'status' => 'required|boolean',
            'img' => 'required'
        ]);
        $insert = new User();
        $insert->name=$req->name;
        $insert->email=$req->email;
        $insert->role_id=$req->role_id;
        $insert->status=$req->status;
        if($insert->password){
          $insert->password=Hash::make($req->password);  
        } 
        if($req->file("img")){
            $img = $req->file("img");
            $imgName = time()."_".$img->getClientOriginalName();
            $img->move(public_path("front_end/assets/images/users/"),$imgName);
            $insert->img= $imgName;
        }  
        if($insert->save()){
            $roleId = Role::find($req->role_id); 
            $userName = $roleId->name;
            $insert->assignRole($userName);
            return \redirect()->route("admin.users.index")->with("success","Data insert success");
        }
    }
    public function delete($id){
        $delete = User::find($id);
        $posts = PostModel::where("user_id",$id)->count();
        
        if($posts>0){
            return  \redirect()->route("admin.users.index")->with("error","User post avaiable you are frist delete his post");
        }else{
            if($delete->img){
                if(File::exists(\public_path("front_end/assets/images/users/").$delete->img)){
                    File::delete(\public_path("front_end/assets/images/users/".$delete->img));
                }; 
            }
        }
        $delete->delete();
        return  \redirect()->route("admin.users.index")->with("success","Data delete success");
        
    }
    public function edit(Request $req,$id){
          $select = User::find($id);  
        $userRole = Role::latest()->get(); 
        return \view("admin.users.edit",\compact("select","userRole"));
    }
    public function update(Request $req,$id){
        $req->validate([
            "name"=>"required",
            // "password"=>"required",
        ]);
        $update = User::find($id);  
        
        $update->name = $req->name;
        $update->role_id = $req->role_id;
        $update->status = $req->status;
        if($update->passwoerd){
            $update->password = Hash::make($req->password);
        }

        if($req->hasFile("img")){
            $img = $req->file("img");
            if(\public_path("front_end/assets/images/users/").$update->img){
                File::delete(\public_path("front_end/assets/images/users/").$update->img);
            } 
            $imgName = \time()."_".$img->getClientOriginalName();
            $img->move(\public_path("front_end/assets/images/users"),$imgName);
            $update->img=$imgName;
        } 
        if($update->save()){
            $roleId = Role::find($req->role_id); 
            $userName = $roleId->name;
            $update->syncRoles($userName);
            return \redirect()->route("admin.users.index")->with("success","Data update succefully");
        }else{
            echo "data update failed";
        }
    }

}