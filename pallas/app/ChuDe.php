<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    const     CREATED_AT    = 'cd_taoMoi';
    const     UPDATED_AT    = 'cd_capNhat';

    protected $table        = 'home_chude';
    protected $fillable     = ['cd_ten', 'cd_taoMoi', 'cd_capNhat', 'cd_trangThai'];
    protected $guarded      = ['cd_id'];

    protected $primaryKey   = 'cd_id';

    protected $dates        = ['cd_taoMoi', 'cd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function loaiChude () {
        return $this->hasMany('App\ChuDe', 'cd_id', 'cd_id');
    }
    public function spChude () {
        return $this->hasMany('App\ChuDeSanPham', 'cd_id', 'cd_id');
    }
}
