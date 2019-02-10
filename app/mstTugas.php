<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstTugas extends Model
{
    public $primaryKey = 'IDTugas';
    protected $table = 'msttugas';
    public $timestamps = true;
    protected $guarded = ['IDTugas'];
}
