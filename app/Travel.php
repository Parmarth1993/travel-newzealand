<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travel_type';

    protected $fillable = [
            'title','sub_title','description','image','address','location',''
    ];
}
