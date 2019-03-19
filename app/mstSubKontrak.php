<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstSubKontrak extends Model
{
    protected $table = "mstsubkontrak";
    public $primaryKey = 'IDSubKontrak';
    public $timestamps = true;
    protected $guarded = ['IDSubKontrak'];
}
