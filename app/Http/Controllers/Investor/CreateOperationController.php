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
        if ($signal != null) {
            return view('investor.createOperation', compact(['signal'])); 
        }

        return view('investor.createOperation');
    }

    public function store(Signal $signal = null, StoreOperation $request)
    {
        $data = $request->validated();

        $units = self::getUnits($data['type'], 1000);

        if (isset($data['oanda'])) {
            $oandaId = Auth::user()->oandaId;
            $oandaToken = Auth::user()->oandaToken;

            $type = self::handleOperationType($data['type']);

            $oandaOperation = OpenTrade::index($oandaToken, $oandaId, $data['currency_pair'], $type, $units, $data['take_profit_1'], $data['stop_loss'], $data['price']);
    
            if($oandaOperation == null || property_exists($oandaOperation,'orderCancelTransaction')) {
                return redirect()->route('investor.openOperations')->with('error', 'Error creando la operación. Vuelva a intentar.');
            }
        }

        if (isset($oandaOperation->orderFillTransaction->id)) {
            $oandaOpId = $oandaOperation->orderFillTransaction->id;
        } else {
            $oandaOpId = 0;
        }

        $operation = new Operation([
            'type' => $data['type'],
            'units' => $units,
            'oandaOpId' => $oandaOpId,
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

    private function handleOperationType(String $type) {
        switch ($type) {
            case 'BUY':
                return 'MARKET';
                break;
            case 'SELL':
                return 'MARKET';
                break;
            case 'BUY LIMIT':
                return 'LIMIT';
                break;
            case 'SELL LIMIT':
                return 'LIMIT';
                break;
            case 'BUY STOP':
                return 'STOP';
                break;
            case 'SELL STOP':
                return 'STOP';
                break;
        }
    }

    private function getUnits(String $type, Int $units) {
        $units = abs($units);

        switch ($type) {
            case 'BUY':
                return $units;
                break;
            case 'SELL':
                return -$units;
                break;
            case 'BUY LIMIT':
                return $units;
                break;
            case 'SELL LIMIT':
                return -$units;
                break;
            case 'BUY STOP':
                return $units;
                break;
            case 'SELL STOP':
                return -$units;
                break;
        }
    }

}
