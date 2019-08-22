<?php

namespace App\Services\Oanda;
use App\Services\Oanda\MoveStopLoss;
use App\Services\Oanda\GetTrade;


class BreakEven
{
    public static function index($oandaToken, $oandaId, $tradeId)
    {
        $trade = GetTrade::index($oandaToken, $oandaId, $tradeId);

        $price = $trade->price;

        $body = MoveStopLoss::index($oandaToken, $oandaId, $tradeId, $price);
    }


}