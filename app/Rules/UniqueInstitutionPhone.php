<?php

namespace App\Rules;

use App\Models\Profile;
use App\Models\User;
use Auth;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueInstitutionPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(Auth::user()->role=="admin"){
            
            $institution= User::findOr(request("institution_id"),function()use ($fail){
                $fail(request(__("this institution not found"))); 
            }); 

            if($institution->profile->phone!=$value){
                $institutionWithThisPhone = Profile::where("phone","=",$value)->get(); 
                if(count($institutionWithThisPhone)> 0){
                 $fail(__("This phone is used"));
                }
            }
        }else{
           
           $institution= Auth::user();
           
           if($institution->profile->phone!=$value){
           
               $institutionWithThisPhone = Profile::where("phone","=",$value)->get(); 
               if(count($institutionWithThisPhone)> 0){
                $fail(__("This phone is used"));
               }
           }
           
        }
    }
}