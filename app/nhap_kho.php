<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhap_kho extends Model
{
    //
    protected $table = "nhap_kho";
    protected $fillable = ['khach_hang_id', 'san_pham_id', 'sl_nhap'];
    public $timestamps = true;

    public function khach_hang()
    {
        return $this->belongsTo(\App\khach_hang::class, 'khach_hang_id', 'id');
    }

    public function san_pham()
    {
        return $this->belongsTo(\App\san_pham::class, 'san_pham_id', 'id');
    }
}
