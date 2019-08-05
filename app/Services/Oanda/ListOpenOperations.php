<?php

namespace App\Services\Oanda;


class ListOpenOperations
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId)
    {
        print $oandaId;
        $client = new \GuzzleHttp\Client();
        $url = strval(Oanda::base($oandaId)).'orders';
        $request = $client->request(
            'GET',
            $url,
            ['headers' => [
                'Authorization' => 'Bearer '.$oandaToken]],
            ['json' => true]
        );

        $response = $request->getBody();
        dd($response);
    }


}
