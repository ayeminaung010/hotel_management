<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|max:15',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'gender' => 'required',
            'aggree' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'username.required' => 'username is required!',
            'username.max' => 'username is maximum length must be 15 or less',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be same or greater than character 6!',
            'gender.required' => 'Gender is required!',
            'aggree.required' => 'aggree the terms is required!',
        ];
    }
}
