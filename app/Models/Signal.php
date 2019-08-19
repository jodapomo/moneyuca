<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Operation;
use App\Models\Modifier;

class Signal extends Model
{
    public function operation()
    {
        return $this->hasOne(Operation::class);
    }

    public function modifier()
    {
        return $this->hasOne(Modifier::class);
    }
}
