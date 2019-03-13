<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstSertifikat extends Model
{
    protected $table = "mstsertifikat";
    public $primaryKey = 'IDSertifikat';
    public $timestamps = false;
    protected $guarded = ['IDSertifikat'];
}
