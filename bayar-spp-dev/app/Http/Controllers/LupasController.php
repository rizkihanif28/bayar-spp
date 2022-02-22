<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LupasController extends Controller
{
    public function index()
    {

        return view('lupa-password.index', [
            'title' => 'Lupa Password'
        ]);
    }
}
