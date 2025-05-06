<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PostModel as blog;
use App\Models\ContactModel;
use App\Models\PostModel; 
use Illuminate\Support\Facades\Redis;

class ContactController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("can:admin.contacs.view")->only("index");  
    }
   public function index(){
      $latestPost = blog::latest()->limit(10)->get();
      return \view("front.layout.pages.contact",\compact( "latestPost"));
   }
   public function store(Request $req){
      $req->validate([
         "name" => "required",
         "email" => "required",
         "subject" => "required",
         "message" => "required",
      ]);
      $data = ContactModel::create($req->all()); 
      if($data){
         return   redirect()->back()->with("success","Message Sent Successfully");
      }else{
      return redirect()->back()->with("error","Message Not Sent");
      }
    
      }

      // for admin view contact 
      public function Contactindex(){
         $ContactData = ContactModel::latest()->get();
         return \view("admin.contact.index",\compact("ContactData"));
      }
}
