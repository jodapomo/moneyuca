<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateConfigurations;
use App\Models\Configuration;

class ConfigurationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $configuration =  Configuration::get();

        return view('admin.configurations', compact('configuration'));
    }

    public function update(UpdateConfigurations $request)
    {
        $configuration =  Configuration::get();

        $data = $request->validated();

        $configuration->update($data);

        return redirect()->route('admin.configurations');
    }

}
