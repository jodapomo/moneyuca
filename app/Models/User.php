<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Resume;
use App\Models\Signal;

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
        if ( $this->role->name == $role ) {
            return true;
        }

        return false;
    }


    public function isValidated()
    {
        return ( $this->isRole('investor') and  $this->validated ) or $this->isRole('admin');  
    }


    public static function getInvestors()
    {
        $investorRole  = Role::where('name', 'investor')->first();

        $investors = $investorRole->users()->where('validated', True)->get();

        return $investors;
    }


    public static function getNewInvestors()
    {
        $investorRole  = Role::where('name', 'investor')->first();

        $investors = $investorRole->users()->where('validated', False)->get();

        return $investors;
    }


    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function operations()
    {
        return $this->hasMany(Signal::class);
    }
}
