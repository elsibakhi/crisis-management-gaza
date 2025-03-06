<?php

namespace App\Http\Requests;

use App\Rules\UniqueInstitutionEmail;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Regions;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UpdateAdminRequest extends FormRequest
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
            'roles'=>["nullable", "array"],
            'roles.*'=>["nullable", "string" , Rule::in(Role::all()->pluck("name")->toArray())],
            'permissions'=>["required_without:roles", "array"], 
            'permissions.*'=>["required_without:roles.*", "string" , Rule::in(Permission::all()->pluck("name")->toArray())],
          
        ];
    }
}