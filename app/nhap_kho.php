<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhap_kho extends Model
{
    //
    protected $table = "nhap_kho";
    protected $fillable = ['ncc_id', 'sp_id', 'gia', 'so_luong' , 'ngay_nhap'];
    public $timestamps = false;

    public function ncc()
    {
        return $this->belongsTo(\App\ncc::class, 'ncc_id', 'id');
    }

    public function san_pham()
    {
        return $this->belongsTo(\App\san_pham::class, 'sp_id', 'id');
    }
}
