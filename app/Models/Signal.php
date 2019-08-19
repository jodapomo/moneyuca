<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Operation;

class Signal extends Model
{
    public function operation()
    {
        return $this->hasOne(Operation::class);
    }
}
