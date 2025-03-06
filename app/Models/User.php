<?php

namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasApiTokens, HasFactory, Notifiable ,HasRoles
    ,Searchable
    ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
    public function toSearchableArray()
    {
        return array_merge($this->toArray(), [
            'id'          => (string) $this->id,  // تحويل id إلى string
          
    
        ]);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    

            public function profile(){
                return $this->hasOne(Profile::class);
            }
            public function institutionData(){
                return $this->hasOne(InstitutionData::class);
            }
            public function services(){
                return $this->hasMany(Service::class);
            }
        
            public function sentMessages(){
                return $this->hasMany(Message::class,"sender_id");
            }
            public function receivedMessages(){
                return $this->morphMany(Message::class,"recipient");
            }
            public function complaints(){

                
              return Complaint::whereHas('service', function (Builder $query)  {
                    $query->where( 'user_id', '=', $this->id);
                });
            }
            public function notes(){
              return Note::whereHas('service', function (Builder $query)  {
                    $query->where( 'user_id', '=', $this->id);
                });
            }
    
            public function links(){
                return $this->hasMany(Link::class);
            }
            public function workingDays(): MorphMany
            {
                return $this->morphMany(WorkingDay::class, 'owner');
            }
            public function scopeInstitutionType(Builder $query,$type): void
            {   

                    $query->whereHas('institutionData', function(Builder $query2)use($type){
                        if($type=="institutions"){
                            $query2->where("status","accepted");
                        }else{
                            $query2->whereNot("status","accepted");
                        }
                              
                    });
            }

            public function unreadChats(){
               return  Message::selectRaw(
                    '
                     LEAST(sender_id, recipient_id) as user1, 
                     GREATEST(sender_id, recipient_id) as user2, 
                     SUM(CASE WHEN read_at IS NULL THEN 1 ELSE 0 END) as has_unread,
                     MAX(created_at) as latest_message_date
                     '
                )
               
                    ->orWhereHasMorph("recipient", [User::class], function ($q2)  {
                        $q2->where("id", $this->id);
                    })
                    ->groupBy("user1", "user2")
                    ->orderBy("latest_message_date","desc")
                    ->having('has_unread',">",0)->get(); // Prioritize groups with unread messages
            }

            public function scopeInstitutions(Builder $query){
                        $query->where("role","institution")->whereHas("institutionData",function(Builder $query2){
                            $query2->where("status","accepted");
                        });
            }
    
}