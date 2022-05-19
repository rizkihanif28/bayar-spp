<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admins/user-role/index', [
            'users' => $users,
            'title' => 'Users List'
        ]);
    }

    public function create($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admins/user-role/create', [
            'user' => $user,
            'role' => $roles,
            'title' => 'Create User'
        ]);
    }

    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        // $user = User::make($request->input());

        return redirect()->route('admins/user-role')->with([
            'type' => 'success',
            'msg' => 'User dengan nama : ' . $user->name . ' berhasil diubah'
        ]);
    }
}
