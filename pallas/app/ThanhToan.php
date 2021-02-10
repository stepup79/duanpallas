<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    const     CREATED_AT    = 'tt_taoMoi';
    const     UPDATED_AT    = 'tt_capNhat';

    protected $table        = 'home_thanhtoan';
    protected $fillable     = ['tt_ten', 'tt_dienGiai', 'tt_taoMoi', 'tt_capNhat', 'tt_trangThai'];
    protected $guarded      = ['tt_id'];

    protected $primaryKey   = 'tt_id';

    protected $dates        = ['tt_taoMoi', 'tt_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function ttDonhang () {
        return $this->hasMany('App\DonHang', 'tt_id', 'tt_id');
    }
}
