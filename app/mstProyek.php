<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstProyek extends Model
{
    public $primaryKey = 'IDProyek';
    protected $table = "mstproyek";
    public $timestamps = false;
    protected $guarded = ['IDProyek'];
}
