<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationTarget extends Model
{
    use HasFactory;
    protected $fillable = [
     
        "name",
      
        "service_id",
  
    ];
}