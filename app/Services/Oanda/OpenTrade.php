<?php

namespace App\Services\Oanda;


class OpenTrade
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId, $instrument, $type, $units, $takeProfit, $stopLoss, $price)
    {

        $body = 
            ['order'=>[
            'instrument' => $instrument,
            'units' => $units,
            'type' => $type,
            'price' => $price,
            'timeInForce' => 'FOK',
            'takeProfitOnFill' => ['price' => $takeProfit],
            'stopLossOnFill' => ['price' => $stopLoss]
            ]];

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . $oandaToken,
        ];

        $client = new \GuzzleHttp\Client(
            ['headers' => $headers]
        );
        $url = strval(Oanda::base($oandaId)).'orders';

        try {
            $response = $client->request(
                "POST",
                $url,
                ['body' => json_encode($body,JSON_FORCE_OBJECT)]
            );
    
            $body = json_decode($response->getBody());
    
            return $body;
        } catch (\Throwable $th) {
            return null;
        }
        

    }

}