<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory,HasUuids;
    protected $primaryKey = 'uuid';
    protected $fillable = ["recipient_id","recipient_type","sender_id","body","read_at"];
    public function sender(){
        return $this->belongsTo(User::class,"sender_id");
    }
    public function recipient(){
        return $this->morphTo();
    }

    public static function markAsRead($sender_id, $recipient_id){
        self::whereHas("sender",function($q1) use($sender_id){
            $q1->where("id",$sender_id);
    })->whereHasMorph("recipient",[User::class],function($q2) use($recipient_id){
        $q2->where("id",$recipient_id);
    })->update(["read_at"=>now()]);
    }
    public  function markMessageAsRead(){
        $this->update(["read_at"=>now()]);
    }
}
