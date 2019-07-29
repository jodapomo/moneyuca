<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Persona;

class InvestorHomeController extends Controller
{
    public static function index()
    {
        return view('investor.index');
    }
}
