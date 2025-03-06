<?php

namespace App\Models;

use App\Models\Scopes\NoteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ["note","service_id"];

    protected static function booted()
        {
        static::addGlobalScope(new NoteScope);
        }
    public function dummyUser(){
        return $this->belongsTo(DummyUser::class);
    }
    public function service(){
        return $this->belongsTo(related: Service::class);
    }

}