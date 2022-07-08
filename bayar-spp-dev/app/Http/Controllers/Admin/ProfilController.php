<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admins/profile', [
            'title' => 'Profil'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:3'
        ], [
            'old_password.required' => 'Password sekarang harus diisi!',
            'new_password.required' => 'Password baru harus diisi!',
            'new_password.min' => 'Password baru harus kurang dari 3 karakter!',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!Hash::check($request->new_password, Auth::user()->password)) {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                User::findOrFail(Auth::user()->id)->update([
                    'password' => $request->new_password,
                ]);
                return redirect()->route('profil')->with('success', 'Password berhasil diubah!');
            } else {
                return back()->with('error', 'Password sekarang salah!');
            }
        } else {
            return back()->with('error', 'Password baru tidak boleh sama dengan password lama');
        }
    }
}
