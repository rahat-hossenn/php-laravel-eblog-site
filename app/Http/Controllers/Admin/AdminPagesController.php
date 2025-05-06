<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicyModel;
use Illuminate\Http\Request;
use App\Models\SettingModel;
use App\Models\TermsOfServiceModel;
use App\Models\MainBannerModel ;

class AdminPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.terms.edit')->only("privacy");
        $this->middleware('can:admin.terms.edit')->only("terms");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function privacy(){
        $privacy = PrivacyPolicyModel::first();  
        return \view("admin.pages.privacy",\compact("privacy"));
    }
    public function update(Request $req){
        $update = PrivacyPolicyModel::first();
        $update->name=$req->privacytitle;
        $update->description=$req->Privacydescription;
        if ($update->save()) {
            return redirect()->route('admin.privacy')->with("success", "Privacy Data সফলভাবে আপডেট করা হয়েছে");
        } else {
            return redirect()->route('admin.privacy')->with("error", "Privacy Data আপডেট করা যায়নি");
        }
    }
    public function terms(){
        $data = TermsOfServiceModel::first();
        return \view("admin.pages.terms",\compact("data"));
    }
    public function termsUpdate(Request $req){
        $data = TermsOfServiceModel::first();
        $data->name=$req->termsTitle;
        $data->description=$req->termsDescription;
        if($data->save()){
            return redirect()->route('admin.terms')->with("success","Terms Of Service সফলভাবে আপডেট করা হয়েছে");
        }else{
            return redirect()->route('admin.terms')->with("error","Terms Of Service আপডেট করা যা)য়নি");
        }
        } 


        
}
