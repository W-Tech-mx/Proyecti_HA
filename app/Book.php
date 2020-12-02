<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'firstname',
        'secondname',
        // 'curp',
        // 'boleta',
        // 'status'

    ];
}
