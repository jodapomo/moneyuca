<?php

namespace App\Services\Oanda;


class GetTrade
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId,$tradeId)
    {
        $client = new \GuzzleHttp\Client();
        $url = strval(Oanda::base($oandaId)) . 'trades/'.$tradeId;

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