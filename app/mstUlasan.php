<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstUlasan extends Model
{
    public $primaryKey = 'IDUlasan';
    protected $table = 'mstulasan';
    public $timestamps = true;
    protected $guarded = ['IDUlasan'];
}
