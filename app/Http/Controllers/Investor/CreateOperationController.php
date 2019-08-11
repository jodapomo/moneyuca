<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Oanda\OpenTrade;
use Illuminate\Support\Facades\Auth;

class CreateOperationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    public function index()
    {
        $user = Auth::user();
        $oandaId = $user->oandaId;
        $oandaToken = $user->oandaToken;
        $instrument = "EUR_USD";
        $type = "MARKET";
        $stopLoss = "1.0000";
        $takeProfit = "1.5000";
        $units = "100";
        $price = "";
        OpenTrade::index($oandaToken, $oandaId, $instrument, $type, $units, $takeProfit, $stopLoss, $price);
        //return view('investor.createOperation');
    }

}
