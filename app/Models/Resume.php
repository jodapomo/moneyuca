<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resume extends Model
{

    protected $fillable = [
        'balance', 'open_operations', 'profits', 'margin_available', 'current_profits',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
