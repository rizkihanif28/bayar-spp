<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class RegisController extends Controller
{
    public function index()
    {
        return view('/regis.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:5', 'max:50'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:4', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // create user ke db
        User::create($validatedData);
        // flash message
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login!!');
    }
}
