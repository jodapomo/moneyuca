<?php

class Oanda {

    function base ($oandaId)
    {
        return 'https://api-fxtrade.oanda.com/v3/accounts/'.$oandaId.'/';
    }

}