<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'image',
        'image',
        'description',
        'author',
        'date',
        'review'
    ];
}
