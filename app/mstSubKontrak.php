<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstSubKontrak extends Model
{
    protected $table = "mstsubkontrak";
    public $timestamps = true;
    protected $guarded = ['IDSubKontrak'];
}
