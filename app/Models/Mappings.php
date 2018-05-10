<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mappings extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mapping_name',
        'mapping_url',
    ];
}
