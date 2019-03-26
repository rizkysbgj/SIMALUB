<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class trxTugas extends Model
{
    public $primaryKey = 'IDTrxTugas';
    protected $table = "trxtugas";
    protected $guarded = ['IDTrxTugas'];
    public $timestamps = true;
}
