<?php

namespace App\Services\Oanda;


class MoveStopLoss
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
        echo json_encode($body);
        $request = $client->request(
            "PUT",
            $url
        );
        $response = $request->getBody();
        echo $response;
        dd($response);
    }


}