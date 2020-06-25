<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tin_tuc extends Model
{
    //
    protected $table = "tin_tuc";
    protected $fillable = ['user_id', 'tieu_de', 'mota', 'noi_dung','ngay_dang'];
    public $timestamps = false;

    public function khach_hang()
    {
        return $this->belongsTo('App\khach_hang', 'khach_hang_id', 'id');
    }

    public function san_pham()
    {
        return $this->belongsTo('App\san_pham', 'san_pham_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
