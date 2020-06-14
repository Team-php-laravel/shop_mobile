<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoa_don extends Model
{
    //
    protected $table = "hoa_don";
    protected $fillable = ['khach_hang_id', 'san_pham_id', 'sl_mua', 'tong_tien', 'create_by'];
    public $timestamps = true;

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
        return $this->belongsTo('App\User', 'create_by', 'id');
    }

}
