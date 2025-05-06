<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBannerModel extends Model
{
    use HasFactory;
    protected $table ="main_banner"; 
 
    protected $fillable = [
        'main_banner_img',
        'main_banner_headding',
        'main_banner_paragrap',
        'small_one_img',
        'smaill_one_paragrap',
        'small_two_img',
        'small_two_paragrap',
    ]; 
}
