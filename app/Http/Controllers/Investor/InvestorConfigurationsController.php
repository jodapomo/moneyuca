<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateConfigurations;
use App\Models\User;

class ConfigurationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    public function index()
    {
        $configuration =  User::get();

        return view('investor.configurations', compact(['configuration']));
    }

    public function update(UpdateConfigurations $request)
    {
        $data = $request->validated();

        $configuration =  Configuration::get();

        $configuration->update($data);

        return redirect()->route('investor.configurations')->with('success', True);
    }

}
