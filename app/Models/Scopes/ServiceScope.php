<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ServiceScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //
        if(Auth::check()){
                if(Auth::user()->role=="institution"){
                    
                    $builder->where("user_id",Auth::user()->id);
                }
        }
        else{

            $builder->orderByDesc("services.created_at")->where(function(Builder $query){
                $query->where('status',"institution")
                ->orWhere( function (Builder $query) {
                  $query->where('status', 'contribution')->whereHas('contribution', function (Builder $query) {
                    $query->where('status',  'accepted');
                });
              });
        
           
              });
        }
    }
}
