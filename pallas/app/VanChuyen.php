<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    const     CREATED_AT    = 'vc_taoMoi';
    const     UPDATED_AT    = 'vc_capNhat';

    protected $table        = 'home_vanchuyen';
    protected $fillable     = ['vc_ten', 'vc_chiPhi' , 'vc_dienGiai', 'vc_taoMoi', 'vc_capNhat', 'vc_trangThai'];
    protected $guarded      = ['vc_id'];

    protected $primaryKey   = 'vc_id';

    protected $dates        = ['vc_taoMoi', 'vc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function vcDonhang () {
        return $this->hasMany('App\DonHang', 'vc_id', 'vc_id');
    }
}
