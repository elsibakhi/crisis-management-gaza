<?php

namespace App\Rules;

use Auth;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ServiceEndTime implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
       
        if(Auth::check()){
        
            $institution_end_time = Carbon::createFromFormat('H:i', Auth::user()->profile->end_time); 
          
             $service_end_time = Carbon::createFromFormat('H:i', $value); 
    
                if ($institution_end_time->lt($service_end_time)) {
               $fail(__("The end time you selected is after the institution end time"));
                } 
          
               
        }
    }
}