<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modifier extends Model
{
    protected $fillable = [
        'type', 'operation_reference', 'currency_pair', 'price'
    ];


    public function signal()
    {
        return $this->belongsTo(Signal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
