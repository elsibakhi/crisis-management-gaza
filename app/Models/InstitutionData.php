<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class InstitutionData extends Model
{
    use HasFactory;
    protected $fillable = [
  
        "type",
        "description",
        "start_time",
        "end_time",
     
        "status",
       
        "location_id",
        "user_id",
    ];

    protected function startTime(): Attribute
    {
     
    
        return Attribute::make(
            set: fn ($value) => Carbon::parse($value)->format('H:i'),
            get: fn ($value) => Carbon::parse($value)->format('H:i'),
        );
    }
    protected function endTime(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Carbon::parse($value)->format('H:i'),
            get: fn ($value) => Carbon::parse($value)->format('H:i'),
        );
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
