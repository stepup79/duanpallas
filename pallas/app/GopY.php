<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GopY extends Model
{
    public $timestamps = false; //created_at, updated_at

    protected $table        = 'home_gopy';
    protected $fillable     = ['gy_thoiGian', 'gy_noiDung', 'kh_id', 'sp_id', 'gy_trangThai'];
    protected $guarded      = ['gy_id'];

    protected $primaryKey   = 'gy_id';

    protected $dates        = ['gy_thoiGian'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function gySanpham () {
        return $this->belongsTo('App\SanPham', 'sp_id', 'sp_id');
    }
    public function gyKhachhang () {
        return $this->belongsTo('App\KhachHang', 'kh_id', 'kh_id');
    }
}
