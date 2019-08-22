<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    public function edit()
    {
        return view('investor.manageAccount');
    }

    public function updateName(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],  
        ], [
            'name.required' => 'Debe ingresar un nombre para confirmar el cambio.',
        ]);

        $currentUser = Auth::user();
        $currentUser->update($data);
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu nombre ha sido actualizado correctamente!');
    }
    public function updatePassword(Request $request)
    {
        $data = request()->validate([
            'password' => ['required', 'string', 'confirmed'],
        
        ], [
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',
                'password.required' => 'Debe ingresar ambas contraseñas antes de confirmar el cambio.',
        ]);
        $currentUser = Auth::user();
        $currentUser->password = Hash::make($data['password']);
        $currentUser->save();
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu contraseña ha sido actualizada correctamente!');
    }
    public function updateOandaId(Request $request)
    {
        $data = request()->validate([
            'oandaId' => ['required','string', 'max:255']
        ], [
            'oandaId.required' => 'Debe ingresar un id de Oanda antes de confirmar el cambio.',
        ]);
        $currentUser = Auth::user();
        $currentUser->update($data);
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu Id Oanda ha sido actualizado correctamente!');
    }
    public function updateOandaToken(Request $request)
    {
        $data = request()->validate([
            'oandaToken' => ['required','string', 'max:255']
        ], [
            'oandaToken.required' => 'Debe ingresar un token de Oanda antes de confirmar el cambio.',
        ]);

        $currentUser = Auth::user();
        $currentUser->update($data);
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu Token de Oanda ha sido actualizado correctamente!');
    }

}
