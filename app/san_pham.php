<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    //
    protected $table = "san_pham";
    protected $fillable = ['ten_sp','loai_id', 'so_luong','sao', 'gia', 'sale', 'hinh_anh', 'mo_ta', 'thong_so', 'trang_thai'];
    public $timestamps = true;
}
