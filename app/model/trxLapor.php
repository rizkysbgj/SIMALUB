<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class trxLapor extends Model
{
    public $primaryKey = 'IDTrxLapor';
    protected $table = "trxlapor";
    protected $guarded = ['IDTrxLapor'];
    public $timestamps = true;
}
