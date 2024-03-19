<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $mesage = session()->get('message');
        return view('dashboard', [
            'message' => $mesage
        ]);
    }
}
