<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDeSanPham extends Model
{
    public $timestamps = false; //created_at, updated_at

    protected $table        = 'home_chudesanpham';
    // protected $fillable     = ['ha_ten'];
    protected $guarded      = ['sp_id', 'cd_id'];

    protected $primaryKey   = ['sp_id', 'cd_id'];
    public $incrementing = false;
}
