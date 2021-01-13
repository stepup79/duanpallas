<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    public $timestamps = false; //created_at, updated_at

    protected $table        = 'home_chitietdonhang';
    protected $fillable     = ['ctdh_soLuong', 'ctdh_donGia'];
    protected $guarded      = ['dh_id', 'sp_id'];

    protected $primaryKey   = ['dh_id', 'sp_id'];
    public $incrementing = false;
}
