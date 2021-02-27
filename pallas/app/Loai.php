<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    const     CREATED_AT    = 'l_taoMoi';
    const     UPDATED_AT    = 'l_capNhat';

    protected $table        = 'home_loai';
    protected $fillable     = ['l_ten', 'l_taoMoi', 'l_capNhat', 'l_trangThai', 'cd_id'];
    protected $guarded      = ['l_id'];

    protected $primaryKey   = 'l_id';

    protected $dates        = ['l_taoMoi', 'l_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function sanphamLoai () {
        return $this->hasMany('App\SanPham', 'l_id', 'l_id');
    }

    public function chudeLoai () {
        return $this->belongsTo('App\ChuDe', 'cd_id', 'cd_id');
    }
}
