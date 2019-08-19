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

    private function oandaRequest($oandaToken, $oandaId) 
    {
        $result = ListOpenOperations::index($oandaToken,$oandaId);
        return $result;
    }
    
    public function index()
    {
        // $user = Auth::user();
        // $oandaId = $user->oandaId;
        // $oandaToken = $user->oandaToken;
        // ListOpenOperations::index($oandaToken,$oandaId);
        $operations = Auth::user()->operations()->where('status', 'open')->get();


        return view('investor.openOperations', compact(['operations']));
    }
}
