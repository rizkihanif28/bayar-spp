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

    public function create()
    {
        return view('admins/users/form', [
            'title' => 'Tambah User'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|confirmed|min:3',
            'role' => 'nullable|in:admin,tatausaha,user'
        ]);

        if (User::create($request->input())) {
            return redirect()->route('admins/users/index')->with([
                'type' => 'success',
                'msg' => 'User ditambahkan'
            ]);
        } else {
            return redirect()->route('admins/users/index')->with([
                'type' => 'danger',
                'msg' => 'User gagal ditambahakan'
            ]);
        }
    }

    public function edit(User $user)
    {
        $user = User::all();
        return view('admins/users/form', [
            'user' => $user,
            'title' => 'Edit User'
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

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('admins/users/index', [
                'type' => 'Success',
                'msg' => 'User dihapus'
            ]);
        } else {
            return redirect()->route('admins/users/index', [
                'type' => 'danger',
                'msg' => 'User gagal dihapus'
            ]);
        }
    }
}
