<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];
}