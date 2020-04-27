<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'karya', 'art_id',
    ];
}
