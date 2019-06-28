<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class InvestorsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }


    public function index()
    {
        $investors = User::getInvestors();

        return view('admin.investors', compact('investors'));
    }

}
