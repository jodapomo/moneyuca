<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\User;

class AdminHomeController extends Controller
{
    public static function index()
    {
        $configuration =  Configuration::get();
        
        $investorsCount = User::getInvestors()->count();

        
        $newInvestorsCount = User::getNewInvestors()->count();

        return view('admin.index', compact(['configuration', 'investorsCount', 'newInvestorsCount']));
    }
}
