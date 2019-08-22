<?php

namespace App\Services\Oanda;


class CancelOp
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId, $tradeId)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . $oandaToken,
        ];

        $client = new \GuzzleHttp\Client(
            ['headers' => $headers]
        );
        $url = strval(Oanda::base($oandaId)).'trades/'.$tradeId.'/close';

        try {
            $request = $client->request(
               "PUT",
             $url
            );
            $response = $request->getBody();
        
            return $response;
        }
        catch(\Throwable $th){
            return null;
        }
    }

}