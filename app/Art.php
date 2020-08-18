<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = "arts";
    protected $guarded = [];
    public $timestamps = false;
}
