<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'enabled' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'source_username',
        'source_domain',
        'destination_username',
        'destination_domain',
        'enabled',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aliases';
}
