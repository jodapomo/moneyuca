<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateConfigurations;
use App\Models\Persona;

class PersonaController extends Controller
{

    public function index()
    {
        $users = DB::table('user')->get();

        return view('personas.index', ['users' => $users]);
    }

    public function create()
    {
        
    }

    public function update(UpdateConfigurations $request)
    {
        $data = $request->validated();

        $configuration =  Configuration::get();

        $configuration->update($data);

        return redirect()->route('admin.configurations');
    }

}