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
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);
        $currentUser = Auth::user();
        $currentUser->update($data);
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu nombre ha sido actualizado correctamente!');
    }
    public function updatePassword(Request $request)
    {
        $data = $this->validate($request, [
            'password' => ['required', 'string', 'confirmed'],[
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            ]
        ]);
        $currentUser = Auth::user();
        $currentUser->password = Hash::make($data['password']);
        $currentUser->save();
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu contraseña ha sido actualizada correctamente!');
    }
    public function updateOandaId(Request $request)
    {
        $data = $this->validate($request, [
            'oandaId' => ['required','string', 'max:255']
        ]);
        $currentUser = Auth::user();
        $currentUser->update($data);
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu Id Oanda ha sido actualizado correctamente!');
    }
    public function updateOandaToken(Request $request)
    {
        $data = $this->validate($request, [
            'oandaToken' => ['required','string', 'max:255']
        ]);
        $currentUser = Auth::user();
        $currentUser->update($data);
        return redirect()->route('investor.manageAccount')->with('mensaje',
            'Tu Token de Oanda ha sido actualizado correctamente!');
    }


}
