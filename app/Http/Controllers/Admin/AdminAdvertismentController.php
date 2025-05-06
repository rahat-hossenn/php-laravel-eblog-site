<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostModel;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\React;

class AdminAdvertismentController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("can:admin.advertisement.edit")->only("indexpage");  

    }  
    public function clicks($id){ 
        $updated = Advertisement::where('id', $id)->where('status', 1)->increment('clicks');
        if($updated){
            $data = Advertisement::find($id);
            return \redirect()->away($data->link);
        }else{
            echo "error";
        }
    }
    public function indexpage(){
        $addvertisments = Advertisement::all();
        return view("admin.advertisement.index",\compact("addvertisments"));
    }
    public function view($id){
        $add = Advertisement::find($id);
        return \view("admin.advertisement.view",\compact("add"));
    }
    public function delete($id){
        $delete = Advertisement::find($id);
        if($delete){
            $imgFilepath =  \public_path("/front_end/assets/images/banner/".$delete->img);
            if(File::exists($imgFilepath)){
                File::delete($imgFilepath);
            }

        }
        if($delete->delete()){
            return \redirect()->back()->with("delete","Advertisement delete successfully");
        }else{
            return \redirect()->back()->with("delete","Advertisement delete failed");
        }

    }
    public function create(){
        return \view("admin.advertisement.create"); 
    }
    public function insert(Request $req){
        $req->validate([
            "adds_link"=>"required",
            "adds_img"=>"required",
        ]);
         $insert = new Advertisement();
         $insert->link =$req->adds_link;
         $insert->status =$req->adds_status; 
         if($req->file("adds_img")){
            $img = $req->file("adds_img");
            $imgName = \time()."_".$img->getClientOriginalName();
         
            $img->move(\public_path("front_end/assets/images/banner/"),$imgName);
            $insert->img =$imgName;
         } 
        
         if($insert->save()){
            return \redirect()->route("admin.add.index")->with("success","Advertisement data upload successfully");
         }else{
            return \redirect()->route("admin.add.index")->with("success","Advertisement data upload failed");
         }
    }
}
