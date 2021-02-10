<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToanCreateRequest extends FormRequest
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
            'tt_ten' => 'required|min:3|max:50|unique:home_thanhtoan',
            'tt_dienGiai' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'tt_ten.required' => 'Tên hình thức thanh toán bắt buộc nhập',
            'tt_ten.min' => 'Tên hình thức thanh toán ít nhất 3 ký tự trở lên',
            'tt_ten.max' => 'Tên hình thức thanh toán tối đa chỉ 50 ký tự',
            'tt_ten.unique' => 'Tên hình thức thanh toán này đã tồn tại. Vui lòng nhập tên hình thức thanh toán khác',
            'tt_dienGiai.required' => 'Mô tả hình thức thanh toán bắt buộc nhập'
        ];
    }
}
