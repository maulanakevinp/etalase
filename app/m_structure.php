<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_structure extends Model
{
    protected $table = "structure";
    protected $primaryKey = "id_structure";
    protected $fillable = [
        'nama' , 'jabatan' , 'image'
    ];
}
