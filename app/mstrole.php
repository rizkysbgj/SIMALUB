<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstrole extends Model
{
    protected $table = "mstrole";
    public $timestamps = false;
    protected $guarded = ['IDRole'];
}
