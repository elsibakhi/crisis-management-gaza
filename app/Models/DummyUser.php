<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class DummyUser extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ["name","phone","ip_address"];
    public function opinion ()
    {
        return $this->hasOne(Opinion::class);
    }
    public function notes ()
    {
        return $this->hasMany(Note::class);
    }
    public function complaints ()
    {
        return $this->hasMany(Complaint::class);
    }
  
    public function contributions ()
    {
        return $this->hasMany(Contribution::class);
    }

 
}