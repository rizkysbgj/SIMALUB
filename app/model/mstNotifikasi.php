<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mstNotifikasi extends Model
{
    public $primaryKey = 'IDNotifikasi';
    protected $table = "mstnotifikasi";
    public $timestamps = true;
    protected $guarded = ['IDNotifikasi'];
}
