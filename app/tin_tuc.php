<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tin_tuc extends Model
{
    //
    protected $table = "tin_tuc";
    protected $fillable = ['user_id', 'tieu_de', 'mota', 'noi_dung','ngay_dang'];
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
