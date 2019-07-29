<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ActiveOrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:inverstor']);
    }


    public function test()
    {
        echo 'this is a test';
    }
    public function index()
    {

        $investors = User::getInvestors();
        $session = Session::all();


        
        return view('investor.activeOrders', compact('session'));
    }

}
