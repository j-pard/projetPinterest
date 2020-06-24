<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'articles';
    public $timestamps = false;
    protected $fillable = [
        'firstname',
        'lastname',
        'pseudo',
    ];
}
