<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    public $timestamps = false; //created_at, updated_at

    protected $table        = 'home_hinhanh';
    protected $fillable     = ['ha_ten'];
    protected $guarded      = ['sp_id', 'ha_stt'];

    protected $primaryKey   = ['sp_id', 'ha_stt'];
    public $incrementing = false;
}
