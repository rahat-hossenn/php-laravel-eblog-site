<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

if(!function_exists("getSetting")){
    function getSetting(){
        return Cache::remember("settingSite",60*0.15,function(){
              return DB::table("settings")->first();
        });
        Cache::forget('settingSite');
    } 
}