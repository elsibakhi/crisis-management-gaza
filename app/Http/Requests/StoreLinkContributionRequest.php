<?php

namespace App\Http\Requests;

use App\Rules\ServiceEndTime;
use App\Rules\ServiceStartTime;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreLinkContributionRequest extends FormRequest
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
    public function rules(Request $request): array
    {

 
        
        return[
            "title" => ["required", "string", "max:100"],
            'description'=>["nullable", "string", "max:500"],
            'uri'=>["required", "string","unique:links,link", "max:300" ,"url"],
            "justification" => ["required", "string", "max:500"]
            
          

          
        ];
    }
}