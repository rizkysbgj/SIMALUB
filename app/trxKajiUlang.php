<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trxKajiUlang extends Model
{
    public $primaryKey = 'IDTrxKajiUlang';
    protected $table = "trxkajiulang";
    protected $guarded = ['IDTrxKajiUlang'];
    public $timestamps = true;
}
