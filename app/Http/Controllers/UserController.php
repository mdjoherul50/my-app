<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('auth.index', compact('users', 'roles'));
    }

    public function edit($id)
    {
        // dd($id);
        $user = User::find($id);
        $roles = Role::all();

        $data = [
            'user' => $user,
            'roles' => $roles
        ];

        return view('auth.edit', $data);
    }

    public function update($id, Request $request)
    {
        // dd($request->role);
        $user = User::find($id);
        $user->update([
            'role_id' => $request->role
        ]);

        return redirect()->back();
    }

    public function adminCreate(Request $request)
    {
        $user = User::find($request->user_id);

        $user->update([
            'role_id' => $request->role_id,
            'approve' => 1
        ]);

        return redirect()->back();
    }
}
