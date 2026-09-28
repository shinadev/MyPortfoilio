<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'project_id';

    public $timestamps = false;

    protected $fillable = [
        'uniqueid',
        'project_name',
        'project_image',
        'project_descr',
    ];
}