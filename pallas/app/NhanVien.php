<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    const     CREATED_AT    = 'nv_taoMoi';
    const     UPDATED_AT    = 'nv_capNhat';

    protected $table        = 'home_nhanvien';
    protected $fillable     = ['nv_ma', 'nv_taiKhoan', 'nv_matKhau', 'nv_hoTen', 'nv_gioiTinh', 'nv_email', 'nv_ngaySinh', 'nv_diaChi', 'nv_dienThoai', 'nv_taoMoi', 'nv_capNhat', 'nv_trangThai', 'q_id'];
    protected $guarded      = ['nv_id'];

    protected $primaryKey   = 'nv_id';

    protected $dates        = ['nv_ngaySinh', 'nv_taoMoi', 'nv_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
