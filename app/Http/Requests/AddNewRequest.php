<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'title'      => 'required|unique:news,news_title|min:5|max:200',
            'images'     => 'required|image',
            'summary'    => 'required|min:5',
            'desciption' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'title.required'      => 'Bạn chưa nhập Tiêu Đề cho Bài viết!',
            'title.unique'        => 'Tiêu Đề bài viết đã tồn tại!',
            'title.min'           => 'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
            'title.max'           => 'Tiêu Đề Bài viết phải nhỏ hơn 200 ký tự!',
            'images.required'     => 'Bạn chưa chọn ảnh!',
            'images.image'        => 'Ảnh không đúng định dạnh!',
            'summary.required'    => 'Bạn chưa nhập Tóm tắt cho Bài viết!',
            'summary.min'         => 'Tóm tắt Bài viết gồm ít nhất 5 ký tự!',
            'desciption.required' => 'Bạn chưa nhập Nội dung cho Bài viết!',
            'desciption.min'      => 'Nội dung Bài viết gồm ít nhất 5 ký tự!',
        ];
    }
}
