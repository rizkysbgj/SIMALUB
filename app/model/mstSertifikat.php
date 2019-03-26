<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mstSertifikat extends Model
{
    protected $table = "mstsertifikat";
    public $primaryKey = 'IDSertifikat';
    public $timestamps = false;
    protected $guarded = ['IDSertifikat'];
}
