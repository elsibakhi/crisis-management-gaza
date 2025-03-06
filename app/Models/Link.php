<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;
class Link extends Model
{
  use HasFactory 
  ,Searchable
   ;
    protected $fillable = ["title","user_id","description","link","status","copied"];

    public function toSearchableArray()
    {
        // Ensure that location is properly formatted as a GeoPoint
        return array_merge($this->toArray(), [
            'id' => (string) $this->id,  // Convert id to string
        
        ]);
    }
    public function contribution(){
        return $this->morphOne(Contribution::class,"addable");
      }


      // scopes
  public function scopeWelcomePage(Builder $query): void
  {
      $query->orderByDesc("created_at")->where(function(Builder $query){
        $query->where('status',"admin")
        ->orWhere( function (Builder $query) {
          $query->where('status', 'contribution')->whereHas('contribution', function (Builder $query) {
            $query->where('status',  'accepted');
        });
      });

   
      });
      
  }
}