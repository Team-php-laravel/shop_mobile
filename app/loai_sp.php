<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_sp extends Model
{
    //
    protected $table = "loai_san_pham";
    protected $fillable = ['ten_loai', 'hinh_anh'];
    public $timestamps = false;

    public function san_pham()
    {
        return $this->hasMany('App\san_pham', 'loai_id', 'id');
    }
}
