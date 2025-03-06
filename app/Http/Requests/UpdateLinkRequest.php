<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateLinkRequest extends FormRequest
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
        return [
            "title" => ["required", "string", "max:100"],
            'description'=>["nullable", "string", "max:500"],
            'uri'=>["required", "string",Rule::unique('links',"link")->ignore($request->input("link_id") ), "max:300" ,"url"],
        ];
    }
}