<?php

namespace App\Services\Oanda;


class OpenTrade
{
    public static function test(){
        echo 'prueba';
    }
    public static function index($oandaToken, $oandaId, $body)
    {
        print $oandaId;
        $
        $client = new \GuzzleHttp\Client();
        $url = strval(Oanda::base($oandaId)).'orders';
        $request = $client->request(
            'POST',
            $url,
            ['headers' => [
                'Authorization' => 'Bearer '.$oandaToken]],
            ['json' => true]
        );

        $response = $request->getBody();
        dd($response);
    }


}