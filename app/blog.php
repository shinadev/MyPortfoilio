<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blogs';

    protected $primaryKey = 'blog_id';

    public $timestamps = false;

    protected $fillable = [
        'blog_title',
        'blog_image',
        'blog_descr',
    ];
}

