<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_sp extends Model
{
    //
    protected $table = "loai_san_pham";
    protected $fillable = ['ten_loai', 'loai_id'];
    public $timestamps = false;

    public function san_pham()
    {
        return $this->hasMany(san_pham::class, 'loai_id', 'id');
    }

    public function child()
    {
        return $this->hasMany(loai_sp::class, 'loai_id', 'id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }
}
