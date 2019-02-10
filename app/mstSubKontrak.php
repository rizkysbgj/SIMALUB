<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstSubKontrak extends Model
{
    protected $table = "mstmilestoneflowtugas";
    public $timestamps = true;
    protected $guarded = ['IDSubKontrak'];
}
