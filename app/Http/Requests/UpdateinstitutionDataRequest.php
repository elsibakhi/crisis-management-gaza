<?php

namespace App\Http\Requests;

use App\Rules\UniqueInstitutionEmail;
use App\Rules\UniqueInstitutionPhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Regions;

class UpdateinstitutionDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
  
            'address'=>["required", "string", "max:200"],  
            'region'=>["required", "string", "max:50",Rule::in(Regions::allowed_regions())],                    
            'lat'=>["required", "numeric"],           
            'lng'=>["required", "numeric"],          
             'workingDays'=>["required", "array"],
            'workingDays.*'=>["required", "string" , Rule::in([
                'saturday',
                 'sunday',
                 'monday',
                 'tuesday',
                 'wednesday',
                 'thursday',
                 'friday'
                 
                 ])],
         
            'start_time'=>["required","date_format:H:i"],
            'end_time'=>["required","date_format:H:i", "after:start_time"],
            'description'=>["nullable", "string", "max:500"],
    
        ];
    }
}