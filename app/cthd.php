<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthd extends Model
{
    //
    protected $table = "chi_tiet_hoa_don";
    protected $fillable = ['hd_id', 'sp_id', 'so_luong', 'don_gia'];
    public $timestamps = false;

    public function khach_hang()
    {
        return $this->belongsTo('App\khach_hang', 'kh_id', 'id');
    }

    public function san_pham()
    {
        return $this->belongsTo('App\san_pham', 'sp_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'create_by', 'id');
    }

}
