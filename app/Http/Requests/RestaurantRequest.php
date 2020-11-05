<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'restaurant_name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'phone' => 'required|unique:users',
            'branch_number' => 'required|numeric',
            'owner_name' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'employee_number' => 'required|numeric',
            'waiter_number' => 'required|numeric',
            'user_name' => 'required',
        ];
    }
}
