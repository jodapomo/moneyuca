<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => ['required', 'string', 'confirmed'],
            'oandaId' => ['nullable','string', 'max:255'],
            'oandaToken' => ['nullable','string', 'max:255'],
        ],[
            'username.unique' => 'El nombre de usuario ya esta en uso.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = new User([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'oandaId' => $data['oandaId'],
            'oandaToken' => $data['oandaToken'],
        ]);
        
        $user->role()->associate(Role::where('name', 'investor')->first());

        $user->save();

        $user->resume()->create([
            'balance' => 0,
            'open_operations' => 0,
            'profits' => 0,
            'margin_available' => 0,
            'current_profits' => 0,
        ]);
        
        return $user;
    }
}
