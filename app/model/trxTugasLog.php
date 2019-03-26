<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class trxTugasLog extends Model
{
    protected $table = "trxtugaslog";
    protected $guarded = ['IDTrxTugasLog'];
    public $timestamps = true;
}
