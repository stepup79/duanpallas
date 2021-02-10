<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    const     CREATED_AT    = 'kh_taoMoi';
    const     UPDATED_AT    = 'kh_capNhat';

    protected $table        = 'home_khachhang';
    protected $fillable     = ['kh_ma', 'kh_taiKhoan', 'kh_matKhau', 'kh_hoTen', 'kh_gioiTinh', 'kh_email', 'kh_ngaySinh', 'kh_diaChi', 'kh_dienThoai', 'kh_taoMoi', 'kh_capNhat', 'kh_trangThai'];
    protected $guarded      = ['kh_id'];

    protected $primaryKey   = 'kh_id';

    protected $dates        = ['kh_ngaySinh', 'kh_taoMoi', 'kh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function khDonhang () {
        return $this->hasMany('App\DonHang', 'kh_id', 'kh_id');
    }
    public function khGopy () {
        return $this->hasMany('App\GopY', 'kh_id', 'kh_id');
    }
}
