<?php

namespace App\Http\Requests;

use App\Rules\UniqueInstitutionEmail;
use App\Rules\UniqueInstitutionPhone;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Regions;

class UpdateInstitutionRequest extends FormRequest
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
            "name" => ["required", "string", "max:200"],
            'email'=>["required", "email", "max:200",new UniqueInstitutionEmail()],
            'password'=>["nullable", "string", "max:70" ,"confirmed"],
            'address'=>["required", "string", "max:200"],    
            'region'=>["required", "string", "max:50",Rule::in(Regions::allowed_regions())],                  
            'lat'=>["required", "numeric"],           
            'lng'=>["required", "numeric"],       
            'type'=>["required", "string" , Rule::in(['food', 'education','health'])],
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
            'phone'=>["required", "string",new UniqueInstitutionPhone()],
            'locale'=>["required", "string" , Rule::in([ 'ar','en'])],
            'start_time'=>["required","date_format:H:i"],
            'end_time'=>["required","date_format:H:i", "after:start_time"],
            'description'=>["nullable", "string", "max:500"],
            // 'logo'=>["nullable", "file",, 'extensions:jpg,png', "max:5000"],
          
        ];
    }
}