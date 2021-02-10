<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanChuyenCreateRequest extends FormRequest
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
            'vc_ten' => 'required|min:3|max:100|unique:home_vanchuyen',
            'vc_chiPhi' => 'required',
            'vc_dienGiai' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'vc_ten.required' => 'Tên hình thức vận chuyển bắt buộc nhập',
            'vc_ten.min' => 'Tên hình thức vận chuyển ít nhất 3 ký tự trở lên',
            'vc_ten.max' => 'Tên hình thức vận chuyển tối đa chỉ 100 ký tự',
            'vc_ten.unique' => 'Tên hình thức vận chuyển này đã tồn tại. Vui lòng nhập tên hình thức vận chuyển khác',
            'vc_chiPhi.required' => 'Chi phí vận chuyển bắt buộc nhập',
            'vc_dienGiai.required' => 'Mô tả vận chuyển bắt buộc nhập'
        ];
    }
}
