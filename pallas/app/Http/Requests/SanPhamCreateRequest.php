<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamCreateRequest extends FormRequest
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
            'sp_ma' => 'required|min:3|max:50|unique:home_sanpham',
            'sp_ten' => 'required|min:5|max:50|unique:home_sanpham',
            'sp_gia' => 'required',
            'sp_hinh' => 'required',
            'sp_thongTin' => 'required',
            'sp_danhGia' => 'required',
            'l_id' => 'required',
            'ncc_id' => 'required',
            'sp_hinhanhlienquan' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'sp_ma.required' => 'Mã sản phẩm bắt buộc nhập',
            'sp_ma.min' => 'Mã sản phẩm ít nhất 3 ký tự trở lên',
            'sp_ma.max' => 'Mã sản phẩm tối đa chỉ 20 ký tự',
            'sp_ma.unique' => 'Mã sản phẩm này đã tồn tại. Vui lòng nhập mã sản phẩm khác',
            'sp_ten.required' => 'Tên sản phẩm bắt buộc nhập',
            'sp_ten.min' => 'Tên sản phẩm ít nhất 3 ký tự trở lên',
            'sp_ten.max' => 'Tên sản phẩm tối đa chỉ 100 ký tự',
            'sp_ten.unique' => 'Tên sản phẩm này đã tồn tại. Vui lòng nhập tên sản phẩm khác',
            'sp_gia.required' => 'Giá sản phẩm bắt buộc nhập',
            'sp_hinh.required' => 'Vui lòng chọn hình đại diện sản phẩm',
            'sp_thongTin.required' => 'Thông tin sản phẩm bắt buộc nhập',
            'sp_danhGia.required' => 'Vui lòng chọn đánh giá sản phẩm',
            'l_id.required' => 'Vui lòng chọn loại sản phẩm',
            'ncc_id.required' => 'Vui lòng chọn nhà cung cấp',
            'sp_hinhanhlienquan.required' => 'Vui lòng chọn hình ảnh liên quan'
        ];
    }
}
