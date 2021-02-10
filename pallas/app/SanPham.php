<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    const     CREATED_AT    = 'sp_taoMoi';
    const     UPDATED_AT    = 'sp_capNhat';

    protected $table        = 'home_sanpham';
    protected $fillable     = ['sp_ma', 'sp_ten', 'sp_gia', 'sp_hinh', 'sp_thongTin', 'sp_danhGia', 'sp_taoMoi', 'sp_capNhat', 'sp_trangThai', 'l_id'];
    protected $guarded      = ['sp_id'];

    protected $primaryKey   = 'sp_id';

    protected $dates        = ['sp_taoMoi', 'sp_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function loaiSanpham () {
        return $this->belongsTo('App\Loai', 'l_id', 'l_id');
    }

    public function spNhacungcap () {
        return $this->belongsTo('App\NhaCungCap', 'ncc_id', 'ncc_id');
    }

    public function spGopy () {
        return $this->hasMany('App\GopY', 'sp_id', 'sp_id');
    }

    public function hinhanhlienquan () {
        return $this->hasMany('App\HinhAnh', 'sp_id', 'sp_id');
    }
}
