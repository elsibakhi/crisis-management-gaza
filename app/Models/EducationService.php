<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationService extends Model
{
    use HasFactory;
    protected $fillable = [
        "status",
        "cost",
        "service_id",
       
    
    ];
}