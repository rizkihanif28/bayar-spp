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
            'user' => $users,
            'title' => 'User Role'
        ]);
    }

    public function create($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admins/user-role/form', [
            'title' => 'Edit role',
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles($request->role);

        return redirect()->route('admins/user-role/index')->with([
            'type' => 'success',
            'msg' => 'Role berhasil disimpan!'
        ]);
    }
}
