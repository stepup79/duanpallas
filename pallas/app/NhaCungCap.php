<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    const     CREATED_AT    = 'ncc_taoMoi';
    const     UPDATED_AT    = 'ncc_capNhat';

    protected $table        = 'home_nhacungcap';
    protected $fillable     = ['ncc_ten', 'ncc_daiDien', 'ncc_diaChi', 'ncc_dienThoai', 'ncc_email', 'ncc_taoMoi', 'ncc_capNhat', 'ncc_trangThai'];
    protected $guarded      = ['ncc_id'];

    protected $primaryKey   = 'ncc_id';

    protected $dates        = ['ncc_taoMoi', 'ncc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nccSanpham () {
        return $this->hasMany('App\SanPham', 'ncc_id', 'ncc_id');
    }
}
