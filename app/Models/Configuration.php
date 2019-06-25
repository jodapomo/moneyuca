<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $fillable = [
        'low_capital', 'take_proffit_limit_1', 'take_proffit_limit_2', 'take_proffit_limit_3', 'risk',
    ];


    public static function get()
    {
        return static::first();
    }
}
