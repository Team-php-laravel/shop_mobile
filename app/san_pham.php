<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    //
    protected $table = "san_pham";
    protected $fillable = ['ten_sp', 'loai_id', 'so_luong', 'gia', 'giam_gia', 'hinh_anh', 'mo_ta', 'mau_sac', 'trang_thai'];
}
