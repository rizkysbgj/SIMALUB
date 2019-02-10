<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trxTugas extends Model
{
    protected $table = "trxtugas";
    protected $guarded = ['IDTrxTugas'];
    public $timestamps = true;
}
