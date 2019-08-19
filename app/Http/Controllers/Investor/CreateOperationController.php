<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOperation;
use App\Services\Oanda\OpenTrade;
use Illuminate\Support\Facades\Auth;
use App\Models\Signal;
use App\Models\Operation;

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

        $operation = new Operation([
            'type' => $data['type'],
            'currency_pair' => $data['currency_pair'],
            'price' => $data['price'],
            'stop_loss' => $data['stop_loss'],
            'take_profit_1' => $data['take_profit_1'],
            'take_profit_2' => $data['take_profit_2'],
            'take_profit_3' => $data['take_profit_3'],
        ]);

        $operation->user()->associate(Auth::user());

        if ($signal != null) {
            $operation->signal()->associate($signal);
            $signal->interpreted = True;
            $signal->save();
        }

        $operation->save();


        return redirect()->route('investor.openOperations')->with('success', 'Operación ' . $operation->type .' creada correctamente.');
        

    }

}
