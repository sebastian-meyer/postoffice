<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TlsPolicy extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'policy' => 'encrypt',
        'params' => '',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain',
        'policy',
        'params',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tlspolicies';
}
