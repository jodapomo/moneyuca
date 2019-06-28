<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class NewInvestorsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $newInvestors = User::getNewInvestors();

        return view('admin.newInvestors', compact('newInvestors'));
    }

    public function validateInvestor(User $investor)
    {
        $investor->validated = True;

        $investor->save();

        return redirect()->route('admin.newInvestors');
    }

}
