<?php

namespace App\Services\Oanda;


class ListOpenOperations
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId)
    {
        $client = new \GuzzleHttp\Client();
        $url = strval(Oanda::base($oandaId)) . 'openTrades';

        try {
            $response = $client->request(
                'GET',
                $url,
                ['headers' => [
                    'Authorization' => ['Bearer ' . $oandaToken]]
                ],
                ['json' => true]
            );
    
            $body = json_decode($response->getBody());
    
            return $body;
        } catch (\Throwable $th) {
            return null;
        }


    }


}
