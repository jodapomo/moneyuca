<?php

namespace App\Services\Oanda;


class CloseAll
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId, $intrument)
    {
        $body = ["longUnits"=> "ALL"];

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . $oandaToken,
        ];

        $client = new \GuzzleHttp\Client(
            ['headers' => $headers]
        );
        $url = strval(Oanda::base($oandaId)).'positions/'.$instrument.'/close';
        try {
            $request = $client->request(
                "PUT",
                $url,
                ['body' => json_encode($body,JSON_FORCE_OBJECT)]
            );
            $response = $request->getBody();
        
            return $response;
        }
        catch(\Throwable $th){
            return null;
        }
    }


}