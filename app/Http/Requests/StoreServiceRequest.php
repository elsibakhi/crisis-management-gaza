<?php

namespace App\Http\Requests;

use App\Rules\ServiceEndTime;
use App\Rules\ServiceStartTime;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Regions;

class StoreServiceRequest extends FormRequest
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

            $allowedWorkingDays = Auth::user()->workingDays->pluck('day')->toArray(); 
            $after_merge=[];
        $public_rules=[
            "title" => ["required", "string", 'unique:services,title', "max:100"],
            "description" => ["nullable", "string", "max:500"],
            
            'address'=>["required", "string", "max:200"], 
            'region'=>["required", "string", "max:50",Rule::in(Regions::allowed_regions())],                     
            'lat'=>["required", "numeric"],           
            'lng'=>["required", "numeric"],  
            'workingDays'=>["required", "array"],
            'workingDays.*'=>["required", "string" , Rule::in($allowedWorkingDays)],
            'start_date'=>["required","date","after_or_equal:now"],
            'period'=>["required", "integer"],
            'start_time'=>["required","date_format:H:i",new ServiceStartTime()],
            'end_time'=>["required","date_format:H:i", "after:start_time",new ServiceEndTime()],
            'files'=>['nullable', "array"],
            'files.*'=>['required_with:files', "file", 'extensions:jpg,png,jpeg', "max:5000"],
          

          
        ];

        switch(Auth::user()->profile->type){
            case "food":
                $after_merge=  array_merge($public_rules,[
                'type'=>["required", "string" , Rule::in(['food_parcel', 'cooking','flour','gas'])],
               ]);
                break;
            case "education":
                $after_merge=  array_merge($public_rules,[
                    'status'=>["required", "string" , Rule::in(['charged', 'free'])],
                    'specializations'=>["required", "array","min:1"],
                    'specializations.*'=>["required", "array","size:1"],
                    'specializations.*.name'=>["required", "string","max:100"],
                    'targets'=>["required", "array","min:1"],
                    'targets.*'=>["required", "array","size:1"],
                    'targets.*.name'=>["required", "string","max:100"],
                    'cost'=>['requiredIf:status,charged',"nullable", "numeric"],
                    
                   ]);
                break;
            case "health":
                $after_merge=  array_merge($public_rules,[
                    'type'=>["required", "string" , Rule::in(['hospital', 'medical_point','clinic','pharmacy'])],
                    'fields'=>["required", "array","min:1"],
                    'fields.*'=>["required", "array","size:1"],
                    'fields.*.name'=>["required", "string","max:100"],
                ]);
                break;
        }
        
        return $after_merge;

    }
}