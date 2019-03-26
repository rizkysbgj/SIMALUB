<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mstUser extends Model
{
    protected $table = "mstuser";
    protected $guarded = ['id'];
    public $timestamps = true; 
}
