<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nia', 'nama', 'jabatan', 'image',
    ];

    public $timestamps = false;
}
