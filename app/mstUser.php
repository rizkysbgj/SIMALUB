<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstUser extends Model
{
    protected $table = "mstusers";
    protected $guarded = ['id'];
}
