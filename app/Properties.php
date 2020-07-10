<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Properties extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name', 'location', 'location_start', 'location_end', 'address', 'address_start', 'address_end', 'logo','category','activities', 'type', 'about', 'highlights'
    ];
}
