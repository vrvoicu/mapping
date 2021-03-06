<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    //

    const TYPE_INPUT = 1, TYPE_OUTPUT = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mapping_id',
        'field_name',
        'field_type'
    ];
}
