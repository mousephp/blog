<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'user_name'           => 'required|alpha|min:5|max:30'.$this->user.',id', 
            'user_email'          => 'required|email',
            'user_password'       => 'required|string|min:6|max:50',
            'user_password_new'   => 'required|string|min:6|different:user_password',
            'user_password_again' => 'required|same:user_password_new'
        ];
    }
    public function messages()
    {
      return [
        'user_name.min'    =>':attribute phải >= 5 ký tự',
        'user_name.max'    =>':attribute phải < 30 ký tự',   
        'user_name.alpha'  =>':attribute  không đúng định dạng',   

        'user_email.required' =>':attribute không được để trống',
        'user_email.email'    =>':attribute không đúng định dạng',

        'user_password.required'  => ':attribute không được để trống',
        'user_password.min'       => ':attribute phải >= 5 ký tự',
        'user_password.max'       => ':attribute phải <= 50 ký tự',

        'user_password_new.different' =>':attribute phải khác mật khẩu cũ',
        'user_password_new.required' => ':attribute không được để trống',
        'user_password_new.min'      => ':attribute phải >= 5 ký tự',
        'user_password_new.max'      => ':attribute phải <= 50 ký tự',
        'user_password_again.same'   => ':attribute và xác nhận mật khẩu phải khớp',           
     ];
 }


 public function attributes(){
    return [
      'user_name'     => 'Tên', 
      'user_email'    => 'email', 
      'user_password' => 'password',
      'user_password_new' => 'Mật khẩu mới'
  ];
}
}
