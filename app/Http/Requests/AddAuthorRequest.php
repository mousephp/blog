<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class AddAuthorRequest extends FormRequest
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
        'images'   => 'required|image', //bail
        'name'     => 'required|min:5|max:30|unique:authors,aut_name',
        'birthday' => 'required',
        'profile'  => 'required|min:5',
        'address'  => 'required',
 
      ];
    }

    public function messages()
    {
      return [
        'images.required'   => ':attribute không được để trống',
        'images.image'      => ':attribute không đúng định dạng',
        'name.max'          => ':attribute phải <= 30 ký tự',   
        'name.min'          => ':attribute phải >= 5 ký tự',   
        'name.unique'       => ':attribute không được trùng',   

        'birthday.required' => ':attribute không được để trống',

        'profile.required'  => ':attribute không được để trống',
        'profile.min'       => ':attribute phải >= 5 ký tự',   

        'address.required'  => ':attribute không được để trống'
      ];
    }

    public function attributes(){
      return [
        'images'   => 'Ảnh', 
        'name'     => 'Tên', 
        'birthday' => 'Tuổi',
        'profile'  => 'Tiểu sử', 
        'address'  => 'Địa chỉ'        
      ];
    }

}
