<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\models\PostModel;
class AdminAuthortificationModel extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'name',
        'email',
        'img',
        'role_id',
        'status',
        'email_verified_at',
        'password',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    } 
    public function posts()
    {
        return $this->belongsTo(PostModel::class, 'user_id');
    }
    
}
