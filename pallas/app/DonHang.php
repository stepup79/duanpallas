<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';

    protected $table        = 'home_donhang';
    protected $fillable     = ['dh_ma', 'kh_id', 'dh_ngayDatHang', 'dh_nguoiNhan', 'dh_diaChi', 'dh_dienThoai', 'dh_loiChuc', 'dh_daThanhToan', 'nv_giaoHang', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat', 'dh_trangThai', 'vc_id', 'tt_id'];
    protected $guarded      = ['dh_id'];

    protected $primaryKey   = 'dh_id';

    protected $dates        = ['dh_ngayDatHang', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function dhVanchuyen () {
        return $this->belongsTo('App\VanChuyen', 'vc_id', 'vc_id');
    }
    public function dhThanhtoan () {
        return $this->belongsTo('App\ThanhToan', 'tt_id', 'tt_id');
    }
    public function dhNhanvien () {
        return $this->belongsTo('App\NhanVien', 'nv_giaoHang', 'nv_id');
    }
    public function dhKhachhang () {
        return $this->belongsTo('App\KhachHang', 'kh_id', 'kh_id');
    }
}
