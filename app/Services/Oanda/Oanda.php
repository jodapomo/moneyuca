<?php

namespace App\Services\Oanda;

class Oanda {

    public static function base ($oandaId)
    {
        return 'https://api-fxpractice.oanda.com/v3/accounts/' . $oandaId . '/';
    }

    public static function getSummary($oandaToken, $oandaId)
    {
        $client = new \GuzzleHttp\Client();
        $url = strval(self::base($oandaId)) . 'summary';

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