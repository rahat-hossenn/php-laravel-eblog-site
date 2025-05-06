<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ="categories";
    protected $fillable = [
        'title',
        'slug',  
    ];
    public function posts()
{
    return $this->hasMany(PostModel::class, 'category_id');
}
}
