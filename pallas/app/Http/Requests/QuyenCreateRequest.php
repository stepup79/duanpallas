<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyenCreateRequest extends FormRequest
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
            'q_ten' => 'required|min:3|max:30|unique:home_quyen',
            'q_dienGiai' => 'required|min:8|max:250',
        ];
    }

    public function messages() 
    {
        return [
            'q_ten.required' => 'Tên quyền bắt buộc nhập',
            'q_ten.min' => 'Tên quyền ít nhất 3 ký tự trở lên',
            'q_ten.max' => 'Tên quyền tối đa chỉ 30 ký tự',
            'q_ten.unique' => 'Tên quyền này đã tồn tại. Vui lòng nhập tên quyền khác',
            'q_dienGiai.required' => 'Mô tả quyền bắt buộc nhập',
            'q_dienGiai.min' => 'Mô tả quyền ít nhất 8 ký tự trở lên',
            'q_dienGiai.max' => 'Mô tả quyền tối đa 250 ký tự'
        ];
    }
}
