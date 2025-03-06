<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;
    protected $fillable = [
        "justification",
        "status",
        "addable_id" ,
        "addable_type" 
    ];
   
    public function dummyUser(){
        return $this->belongsTo(DummyUser::class);
    
        }

            public function addable(){
                return $this->morphTo();
            }

}