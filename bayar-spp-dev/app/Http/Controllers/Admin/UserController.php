<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admins/users/index', [
            'user' => $user,
            'title' => 'User List'
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admins/users/form', [
            'title' => 'Create User',
            'roles' => $roles

        ]);
    }

    public function edit(User $user)
    {
        return view('admins/users/form', [
            'user' => $user,
            'title' => 'Edit User'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:3',
        ]);

        if ($request->password != null) {
            $user->fill($request->input());
        } else {
            $user->fill($request->except('password'));
        }

        if ($user->save()) {
            return redirect()->route('admins/user/index')
                ->with('success', 'User berhasil di ubah!');
        } else {
            return redirect()->route('admins/user/index')
                ->with('error', 'User gagal di ubah!');
        }
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('admins/user/index')
                ->with('success', 'User berhasil di ubah!');
        } else {
            return redirect()->route('admins/user/index')
                ->with('error', 'User gagal di ubah!');
        }
    }
}
