<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsOfServiceModel extends Model
{
    use HasFactory;

    // Optional: If you want to specify custom table name
    protected $table = 'terms_of_service';

    // Fillable fields
    protected $fillable = [
        'name', 
        'description',  
    ];
}
