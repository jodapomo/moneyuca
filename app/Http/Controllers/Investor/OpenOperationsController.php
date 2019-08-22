<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Oanda\ListOpenOperations;
use Illuminate\Support\Facades\Auth;

class OpenOperationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    private function getOperations() 
    {
        $oandaId = Auth::user()->oandaId;
        $oandaToken = Auth::user()->oandaToken;
        $result = ListOpenOperations::index($oandaToken,$oandaId);
        return $result;
    }
    
    public function index()
    {
        
        // $oandaOperations = self::getOperations();

        // if ($oandaOperations != null) {
        //     self::updateDbOperations($oandaOperations);
        // }

        $operations = Auth::user()->operations()->where('status', 'open')->orderBy('id', 'DESC')->get();

        return view('investor.openOperations', compact(['operations']));
    }

    private function updateDbOperations(Object $oandaOperations) {
        $oandaOperations = $oandaOperations->trades;
        Auth::user()->operations()->where('status', 'open')->update(['status' => 'close']);

        foreach ($oandaOperations as $op) {
            $opDb = Auth::user()->operations()->where('oandaOpId', $op->id)->first();
            if($opDb != null) {
                $opDb->status = 'open';
                $opDb->save();
            }
        }
    }
}
