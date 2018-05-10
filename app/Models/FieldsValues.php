<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldsValues extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mapping_id',
        'field_id',
        'field_value',
        'group_id'
    ];
}
