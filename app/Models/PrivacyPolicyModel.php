<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class PrivacyPolicyModel extends Model
{
    use HasFactory;

    // Optional: If you want to specify custom table name
    protected $table = 'privacy_policy';

    // Fillable fields
    protected $fillable = [
        'name', 
        'description',  
    ];
}
