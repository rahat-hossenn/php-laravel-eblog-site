<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingModel; 
use Illuminate\Support\Facades\File;

class AdminSettingController extends Controller
{  
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.settings.edit')->only("setting");
    }
 
    public function setting()
    {
        $data = SettingModel::first();
        return \view("admin.setting.index",\compact("data"));
    }  
    public function setting_update(Request $req){
        $update = SettingModel::first();  
 
        
        if ($req->hasFile("logo")) {
            $filePath = $req->file("logo");
            $imgName = time() . "_" . $filePath->getClientOriginalName();

            $oldLogoPath = public_path("front_end/settings/{$update->logo}");
            if (File::exists($oldLogoPath)) {
                File::delete($oldLogoPath);
            }

            $filePath->move(public_path("front_end/settings"), $imgName);
            $update->logo = $imgName;
        }
         
        if ($req->hasFile('fav_icon')) {
            $favIcon = $req->file('fav_icon');
            $favIconName = time() . "_" . $favIcon->getClientOriginalName();
         
            $oldFaviconPath = public_path("front_end/settings/{$update->fav_icon}");
            if (File::exists($oldFaviconPath)) {
                File::delete($oldFaviconPath);
            } 
            $favIcon->move(public_path('front_end/settings'), $favIconName);
            $update->fav_icon = $favIconName;
        }
     
        $update->site_name = $req->siteName;
        $update->map_url = $req->map_url;
        $update->phone = $req->phone;
        $update->email = $req->email;
        $update->address = $req->address;
        $update->copy_right = $req->copy_write;
        $update->fb = $req->fb;
        $update->insta = $req->insta;
        $update->twitter = $req->twitter;
        $update->youtube = $req->youtube;
        $update->home_title = $req->home_title;
        $update->blog_title = $req->blog_title;
        $update->contact_title = $req->contact_title;
        $update->blog_show_title = $req->blog_show_title;
        $update->category_title = $req->category_title;
        $update->privacy_title = $req->privacy_title;
        $update->terms_title = $req->terms_title;
    
        // সেভ করতে হবে
        $update->save();
        return redirect()->route('admin.setting')->with('success', 'Settings updated successfully!');
    }
    
}