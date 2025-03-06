<?php

namespace App\Rules;

use Auth;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ServiceStartTime implements ValidationRule
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
        $institutionStartTime = Carbon::createFromFormat('H:i', Auth::user()->profile->start_time); 
$serviceStartTime = Carbon::createFromFormat('H:i', $value);


    if ($institutionStartTime->gt($serviceStartTime)) {
        $fail(__("The start time you selected is before the institution start time"));
    }

        
      
      }
    }
}