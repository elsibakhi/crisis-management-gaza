<?php

namespace App\Models;

use App\Models\Scopes\ComplaintScope;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Complaint extends Model
{
    use HasFactory;
    
    protected $fillable = ["complaint","service_id"];

    protected static function booted()
        {
        static::addGlobalScope(new ComplaintScope);
        }
    public function dummyUser(){
        return $this->belongsTo(DummyUser::class);
    }
    public function service(){
        return $this->belongsTo(related: Service::class);
    }

    
}