<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public static function rules()
    {
        return [
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email|unique:users,email',
            'address'=>'required',
            'phone'=>'required',
            'password'=>'min:6'
        ];
    }
}
