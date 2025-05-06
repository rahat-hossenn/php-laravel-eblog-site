<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;
    protected $table="settings";
    protected $fillable = [
        'site_name',
        'logo',
        'fav_icon',
        'map_url',
        'phone',
        'email',
        'address',
        'copy_right',
        'fb',
        'insta',
        'twitter',
        'youtube',
        'home_title',
        'blog_title',
        'contact_title',
        'blog_show_title',
        'category_title',
        'privacy_title',
        'terms_title',
    ];
    
    
}
