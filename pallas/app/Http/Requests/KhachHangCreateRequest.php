<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangCreateRequest extends FormRequest
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
            'kh_taiKhoan' => 'required|min:3|max:50|unique:home_khachhang',
            'kh_matKhau' => 'required|min:3|max:50',
            'kh_hoTen' => 'required|min:3|max:50',
            'kh_ngaySinh' => 'required',
            'kh_dienThoai' => 'required',
            'kh_email' => 'required|email:rfc,dns',
            'kh_diaChi' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'kh_taiKhoan.required' => 'Tên tài khoản bắt buộc nhập',
            'kh_taiKhoan.min' => 'Tên tài khoản ít nhất 3 ký tự',
            'kh_taiKhoan.max' => 'Tên tài khoản tối đa 50 ký tự',
            'kh_taiKhoan.unique' => 'Tên tài khoản đã tồn tại. Vui lòng nhập tên tài khoản khác',
            'kh_matKhau.required' => 'Mật khẩu bắt buộc nhập',
            'kh_matKhau.min' => 'Mật khẩu ít nhất 3 ký tự',
            'kh_matKhau.max' => 'Mật khẩu tối đa 50 ký tự',
            'kh_hoTen.required' => 'Họ tên bắt buộc nhập',
            'kh_hoTen.min' => 'Họ tên ít nhất 3 ký tự',
            'kh_hoTen.max' => 'Họ tên tối đa 50 ký tự',
            'kh_ngaySinh.required' => 'Ngày sinh bắt buộc nhập',
            'kh_dienThoai.required' => 'Điện thoại bắt buộc nhập',
            'kh_email.required' => 'Email bắt buộc nhập',
            'kh_email.email' => 'Vui lòng nhập email theo mẫu name@example.com',
            'kh_diaChi.required' => 'Địa chỉ bắt buộc nhập'
        ];
    }
}
