<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Signal;
use App\Models\User;

class Operation extends Model
{

    protected $fillable = [
        'type', 'currency_pair', 'price', 'stop_loss', 'take_profit_1', 'take_profit_2', 'take_profit_3', 'units', 'oandaOpId'
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
