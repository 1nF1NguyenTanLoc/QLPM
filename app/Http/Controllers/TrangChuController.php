<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function index()
    {
        return view('home.trangchu');
    }

    public function viewProfile()
    {
        return view('user.profile');
    }
}
