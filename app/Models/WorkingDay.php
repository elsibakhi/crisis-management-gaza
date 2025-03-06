<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WorkingDay extends Model
{
    use HasFactory;
    
    protected $fillable = ["day"];

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }
}