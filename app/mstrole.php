<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstrole extends Model
{
    protected $table = "mstrole";
    public $primaryKey = 'IDRole';
    public $timestamps = false;
    protected $guarded = ['IDRole'];
}
