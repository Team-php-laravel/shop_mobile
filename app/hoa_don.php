<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoa_don extends Model
{
    //
    protected $table = "hoa_don";
    protected $fillable = ['kh_id', 'user_id', 'ngay_tao', 'tong_gia', 'type_id'];
    public $timestamps = false;

    public function khach_hang()
    {
        return $this->belongsTo('App\khach_hang', 'kh_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function cthd()
    {
        return $this->hasMany(cthd::class, 'hd_id', 'id');
    }

}
