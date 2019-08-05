<?php

namespace App\Services\Oanda;

class Oanda {

    public static function base ($oandaId)
    {
        return 'https://api-fxpractice.oanda.com/v3/accounts/'.$oandaId.'/';
    }

}