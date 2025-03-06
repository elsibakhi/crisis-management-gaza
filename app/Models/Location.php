<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Location extends Model
{
    use HasFactory 
    ,Searchable
    ;
    protected $fillable = ["address","lat","lng","region"];
      // تخصيص كيفية فهرسة البيانات (اختياري)
   
      public function toSearchableArray()
      {
          // Ensure that location is properly formatted as a GeoPoint
          return array_merge($this->toArray(), [
              'id' => (string) $this->id,  // Convert id to string
              'location' =>  array(
                (float) $this->lat, // Latitude
                (float) $this->lng  // Longitude
              )
          ]);
      }

}

