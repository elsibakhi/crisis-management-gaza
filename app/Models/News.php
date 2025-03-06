<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class News extends Model
{
    use HasFactory 
    ,Searchable 
    ;
    protected $fillable = ["title","news"];

    public function toSearchableArray()
    {
        // Ensure that location is properly formatted as a GeoPoint
        return array_merge($this->toArray(), [
            'id' => (string) $this->id,  // Convert id to string
        
        ]);
    }
}