<?php

namespace App\Http\Requests;

use App\Rules\ProhibitedDomains;
use App\Rules\ProhibitedWords;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'unique:users',
                'string',
                'min:8',
                'regex:/[a-z0-9]/i',
                Rule::prohibitedIf(fn () => in_array($this->validationData()['name'] ?? '', (new ProhibitedWords())(), true)),
            ],
            'email' => [
                'required',
                'unique:users',
                'email',
                Rule::prohibitedIf(fn () => in_array($this->validationData()['email'] ?? '', (new ProhibitedDomains())(), true))
            ],
            'notes' => 'present',
        ];
    }
}
