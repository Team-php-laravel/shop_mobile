<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    //
    protected $table = "khach_hang";
    protected $fillable = ['ten_kh', 'dia_chi', 'email', 'sdt'];
    public $timestamps = false;
}
