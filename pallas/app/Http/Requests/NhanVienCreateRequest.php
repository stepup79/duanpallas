<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienCreateRequest extends FormRequest
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
            'nv_taiKhoan' => 'required|min:3|max:50|unique:home_nhanvien',
            'nv_matKhau' => 'required|min:3|max:50',
            'nv_hoTen' => 'required|min:3|max:50',
            'nv_ngaySinh' => 'required',
            'nv_dienThoai' => 'required',
            'nv_email' => 'required|email:rfc,dns',
            'nv_diaChi' => 'required',
            'q_id' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'nv_taiKhoan.required' => 'Tên tài khoản bắt buộc nhập',
            'nv_taiKhoan.min' => 'Tên tài khoản ít nhất 3 ký tự',
            'nv_taiKhoan.max' => 'Tên tài khoản tối đa 50 ký tự',
            'nv_taiKhoan.unique' => 'Tên tài khoản đã tồn tại. Vui lòng nhập tên tài khoản khác',
            'nv_matKhau.required' => 'Mật khẩu bắt buộc nhập',
            'nv_matKhau.min' => 'Mật khẩu ít nhất 3 ký tự',
            'nv_matKhau.max' => 'Mật khẩu tối đa 50 ký tự',
            'nv_hoTen.required' => 'Họ tên bắt buộc nhập',
            'nv_hoTen.min' => 'Họ tên ít nhất 3 ký tự',
            'nv_hoTen.max' => 'Họ tên tối đa 50 ký tự',
            'nv_ngaySinh.required' => 'Ngày sinh bắt buộc nhập',
            'nv_dienThoai.required' => 'Điện thoại bắt buộc nhập',
            'nv_email.required' => 'Email bắt buộc nhập',
            'nv_email.email' => 'Vui lòng nhập email theo mẫu name@example.com',
            'nv_diaChi.required' => 'Địa chỉ bắt buộc nhập',
            'q_id.required' => 'Vui lòng chọn quyền hạn'
        ];
    }
}
