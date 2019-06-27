<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Resume;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'oandaId', 'oandaToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isRole( $role )
    {
        if ($this->role()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public static function getInvestors()
    {
        $investorRoleId  = Role::where('name', 'investor')->first()->id;

        return static::where('role_id', $investorRoleId)->get();
    }

    public function resume()
    {
        return $this->hasOne(Resume::class)->withDefault([
            'balance' => 0,
            'open_operations' => 0,
            'profits' => 0,
            'margin_available' => 0,
            'current_profits' => 0,
        ]);
    }
}
