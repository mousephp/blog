<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'user_name'             => 'required|alpha|min:5|max:30|unique:users,name', //bail
            'user_email'            => 'required|email',
            'user_password'         => 'required|min:5|max:50',//|confirmed
            'password_confirmation' => 'required|min:5|same:user_password'
        ];
    }
    public function messages()
    {
        return [
            'user_name.required'       => ':attribute không được để trống',
            'user_name.min'            => ':attribute phải >= 5 ký tự',
            'user_name.max'            => ':attribute phải < 30 ký tự',   
            'user_name.alpha'          => ':attribute  không đúng định dạng',   
            'user_name.unique'         => ':attribute đã bị trùng',   

            'user_email.required'      => ':attribute không được để trống',
            'user_email.email'         => ':attribute không đúng định dạng',

            'user_password.required'   => ':attribute không được để trống',
            'user_password.min'        => ':attribute phải >= 5 ký tự',
            'user_password.max'        => ':attribute phải <= 50 ký tự',

            'password_confirmation.same'     => 'password và xác nhận :attribute phải khớp', 
            'password_confirmation.min'      => ':attribute phải >= 5 ký tự',
            'password_confirmation.required' => ':attribute không được để trống'        
        ];
    }

    public function attributes(){
        return [
          'user_name'             => 'User', 
          'user_email'            => 'email', 
          'user_password'         => 'password',
          'password_confirmation' => 'password_confirmation'
      ];
    }

}
