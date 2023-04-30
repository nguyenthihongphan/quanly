<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Exception;
class NameRequest extends FormRequest
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
        return[
            'firstname'=>'required', 'string',
        'lastname'=>'required', 'string',
'email'=>'required', 'email:rfc,dns', 'min:8','max:50',
'password'=>'required', 'string', 'min:6',
'user_flg'=>'required',
'phone'=>'required', 'min:8',
'address'=>'required', 'string', 'min:2','max:50',      
'birth'=>'required', 'min:8',
'avatar'=>'required',
'information'=>'required', 'string', 'min:2','max:50',
];


    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'firstname.required' => 'Firstname is required',
            'lastname.required' => 'Lastname is required',
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}
