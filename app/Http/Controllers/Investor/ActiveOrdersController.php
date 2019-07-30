<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\Oanda\ListActiveOrders;
use App\Models\User;

class ActiveOrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }


    public function test(Request $request)
    {
        $user = auth()->user();
  
        print($user->id);
        print($user->name);
        print($user->oandaToken);
        
    }
    public function index()
    {
        $user=auth()->user();
        $oandaToken = $user->oandaToken;
        $oandaID = $user->oandaId;

        
        //OANDA REQUEST 
        
        
        return view('investor.activeOrders', compact('user'));
    }

    


}
