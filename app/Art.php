<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'gambar', 'deskripsi', 'ikon',
    ];

    public $timestamps = false;
}
