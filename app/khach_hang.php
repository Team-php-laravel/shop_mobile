<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    //
    protected $table = "khach_hang";
    protected $fillable = ['ten_kh', 'dia_chi', 'email', 'sdt'];
    public $timestamps = false;

    public function hoa_don()
    {
        return $this->hasMany(hoa_don::class, "kh_id", "id");
    }
}
