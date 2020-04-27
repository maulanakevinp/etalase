<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'logo', 'deskripsi', 'sejarah', 'alamat', 'kontak', 'email', 'website', 'instagram', 'facebook', 'twitter'
    ];

    public $timestamps = false;
}
