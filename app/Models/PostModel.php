<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class PostModel extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'img', 
        'user_id',
        'status',
        'is_banner',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Category.php (Model)
    public function posts()
    {
        return $this->hasMany(PostModel::class, 'category_id');
    }

    
}
