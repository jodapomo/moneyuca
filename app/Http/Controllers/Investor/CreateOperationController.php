<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOperation;
use App\Services\Oanda\OpenTrade;
use Illuminate\Support\Facades\Auth;
use App\Models\Signal;

class CreateOperationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    public function index(Signal $signal = null)
    {
        // $user = Auth::user();
        // $oandaId = $user->oandaId;
        // $oandaToken = $user->oandaToken;
        // $instrument = "EUR_USD";
        // $type = "MARKET";
        // $stopLoss = "1.0000";
        // $takeProfit = "1.5000";
        // $units = "100";
        // $price = "";
        // OpenTrade::index($oandaToken, $oandaId, $instrument, $type, $units, $takeProfit, $stopLoss, $price);

        if ($signal != null) {
            return view('investor.createOperation', compact(['signal'])); 
        }

        return view('investor.createOperation');
    }

    public function store(Signal $signal = null, StoreOperation $request)
    {
        $data = $request->validated();
        dd($data);
    }

}
