<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Oanda\Oanda;

class InvestorHomeController extends Controller
{
    public static function index()
    {
        $oandaId = Auth::user()->oandaId;
        $oandaToken = Auth::user()->oandaToken;
        $res = Oanda::getSummary($oandaToken, $oandaId);

        if ( $res == null ) {
            $resume = Auth::user()->resume;
            // dd($resume->balance);
            $summary = (object)[
                'balance' => $resume->balance,
                'openTradeCount' => $resume->open_operations,
                'pl' => $resume->profits,
                'marginAvailable' => $resume->margin_available,
            ];
            return view('investor.index', compact(['summary']));
        }

        $summary = $res->account;

        $data = [
            'balance' => $summary->balance,
            'open_operations' => $summary->openTradeCount,
            'profits' => $summary->pl,
            'margin_available' => $summary->marginAvailable,
            'current_profits' => $summary->pl,
        ];

        Auth::user()->resume()->update($data);
        
        return view('investor.index', compact(['summary']));
    }
}
