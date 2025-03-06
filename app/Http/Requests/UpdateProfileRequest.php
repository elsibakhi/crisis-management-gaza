<?php

namespace App\Http\Requests;

use App\Rules\UniqueInstitutionEmail;
use App\Rules\UniqueInstitutionPhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Regions;

class UpdateProfileRequest extends FormRequest
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
            'email'=>["required", "email", "max:200",Rule::unique('users')->ignore(auth()->id())],
           
            'phone'=>["nullable", "string",Rule::unique('profiles')->ignore(auth()->id())],
             'locale'=>["required", "string" , Rule::in([ 'ar','en'])],
             'theme'=>["required", "string" , Rule::in([ 'dark','light'])],
            'profile_avatar'=>["nullable", "file", 'extensions:jpg,png,jpeg', "max:5000"],
        ];
    }
}