<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admins/users/index', [
            'users' => $user,
            'title' => 'Users'
        ]);
    }

    public function edit(User $user)
    {
        return view('admins/users/form', [
            'user' => $user,
            'title' => 'Edit Pengguna'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users|max:255',
            'password' => 'nullable|confirmed|min:3',
            'role' => 'required|in:Admin,Tatausaha,User'
        ]);

        $user = $user->fill($request->input());

        if ($user->save()) {
            return redirect()->route('admins/users/index', [
                'type' => 'Success',
                'msg' => 'User diubah'
            ]);
        } else {
            return redirect()->route('admins/users/index', [
                'type' => 'danger',
                'msg' => 'User gagal diubah'
            ]);
        }
    }
}
