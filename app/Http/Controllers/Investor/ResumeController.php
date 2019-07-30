<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ResumeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }


    public function test()
    {
        echo 'this is a test';
    }
    public function index()
    {
        //REQUEST TO OANDA


        
        return view('investor.resume');
    }

}