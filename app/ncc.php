<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ncc extends Model
{
    //
    protected $table = "ncc";
    protected $fillable = ['ten_ncc', 'dia_chi', 'sdt', 'ms_thue', 'stk'];
    public $timestamps = false;


}
