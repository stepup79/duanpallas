<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';

    protected $table        = 'home_donhang';
    protected $fillable     = ['dh_ma', 'kh_id', 'dh_thoiGianDatHang', 'dh_thoiGianNhanHang', 'dh_nguoiNhan', 'dh_diaChi', 'dh_dienThoai', 'dh_nguoiGui', 'dh_loiChuc', 'nv_xuLy', 'dh_ngayXuLy', 'nv_giaoHang', 'dh_ngayLapPhieuGiao', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat', 'dh_trangThai', 'vc_id', 'tt_id'];
    protected $guarded      = ['dh_id'];

    protected $primaryKey   = 'dh_id';

    protected $dates        = ['dh_thoiGianDatHang', 'dh_thoiGianNhanHang', 'dh_ngayXuLy', 'dh_ngayLapPhieuGiao', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
