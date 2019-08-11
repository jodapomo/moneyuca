<?php

namespace App\Services\Oanda;


class OpenTrade
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId, $instrument, $type, $units, $takeProfit, $stopLoss, $price)
    {
        print $oandaId;
        $body = 
            ["order"=>[
            "instrument" => $instrument,
            "units" => $units,
            "type" => $type,
            "price" => $price,
            "timeInForce" => "FOK",
            "takeProfitOnFill" => ["price" => $takeProfit],
            "stopLossOnFill" => ["price" => $stopLoss]
            ]];
        //$body = json_encode($body);
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer ".$oandaToken,
        ];

        $client = new \GuzzleHttp\Client(
            ['headers' => $headers]
        );
        $url = strval(Oanda::base($oandaId)).'orders';
        echo json_encode($body);
        $request = $client->request(
            "POST",
            $url,
            ['body' => json_encode($body,JSON_FORCE_OBJECT)]
        );
        $response = $request->getBody();
        echo $response;
        dd($response);
    }


}