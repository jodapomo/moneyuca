<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Signal;

class UninterpretedSignalsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    public function index()
    {

        $signals = Signal::where('interpreted', False)->get();

        return view('investor.uninterpretedSignals', compact(['signals']));
    }
}
