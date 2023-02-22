<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'room_type' => 'required',
            'room_no' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'first_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'card_type' => 'required',
            'card_no' => 'required',
            'address' => 'required',
            'guest_no' => 'required',
        ];
    }
}
