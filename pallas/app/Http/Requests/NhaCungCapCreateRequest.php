<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapCreateRequest extends FormRequest
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
            'ncc_ten' => 'required|min:3|max:50|unique:home_nhacungcap',
            'ncc_daiDien' => 'required|min:5|max:50',
            'ncc_diaChi' => 'required|min:5|max:150',
            'ncc_dienThoai' => 'required',
            'ncc_email' => 'required|email:rfc,dns',
        ];
    }

    public function messages() 
    {
        return [
            'ncc_ten.required' => 'Tên nhà cung cấp bắt buộc nhập',
            'ncc_ten.min' => 'Tên nhà cung cấp ít nhất 3 ký tự trở lên',
            'ncc_ten.max' => 'Tên nhà cung cấp tối đa chỉ 50 ký tự',
            'ncc_ten.unique' => 'Tên nhà cung cấp này đã tồn tại. Vui lòng nhập tên nhà cung cấp khác',
            'ncc_daiDien.required' => 'Tên người đại diện bắt buộc nhập',
            'ncc_daiDien.min' => 'Tên người đại diện ít nhất 3 ký tự trở lên',
            'ncc_daiDien.max' => 'Tên người đại diện tối đa chỉ 50 ký tự',
            'ncc_diaChi.required' => 'Địa chỉ bắt buộc nhập',
            'ncc_diaChi.min' => 'Địa chỉ ít nhất 3 ký tự trở lên',
            'ncc_diaChi.max' => 'Địa chỉ tối đa chỉ 150 ký tự',
            'ncc_dienThoai.required' => 'Điện thoại bắt buộc nhập',
            'ncc_email.required' => 'Email bắt buộc nhập',
            'ncc_email.email' => 'Vui lòng nhập email theo mẫu example@gmail.com'
        ];
    }
}
