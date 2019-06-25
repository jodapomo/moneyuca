<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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


    public function update(Request $request)
    {
        $configuration =  Configuration::get();

        $data = request()->validate([
            'low_capital' => 'required|numeric',
            'take_proffit_limit_1' => 'required|numeric',
            'take_proffit_limit_2' => 'required|numeric',
            'take_proffit_limit_3' => 'required|numeric',
            'risk' => 'required|numeric',
        ]);

        $configuration->update($data);

        return redirect()->route('admin.configurations');
    }

}
