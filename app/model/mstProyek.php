<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mstProyek extends Model
{
    public $primaryKey = 'IDProyek';
    protected $table = "mstproyek";
    public $timestamps = true;
    protected $guarded = ['IDProyek'];
}
