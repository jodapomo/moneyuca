<?php

namespace App\API\Oanda\ListOpenOperations;

use App\API\Oanda\Oanda;
use Illuminate\Support\Facades\Auth;

class ListOpenOperations extends Oanda
{
    public static function test(){
        echo 'prueba';
    }
    public static function index()
    {
        $user = Auth::user();
        $oandaId = $user->oandaId;
        $oandaToken = $user->oandaToken;

        $client = new \GuzzleHttp\Client();
        $request = $client->get(base($oandaId));
        $response = $request->getBody();
   
        dd($response);
    }


}
