<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::all();
        return view('users.index',compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:2',
        ]);

        UserModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make( $request->password), // casteado como hashed
        ]);

        return redirect()->route('users')
            ->with('success', 'Usuario creado correctamente');
    }

    public function edit(UserModel $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, UserModel $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only('name', 'email');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users')
            ->with('success', 'Usuario actualizado');
    }

    public function destroy(UserModel $user)
    {
        $user->delete();

        return redirect()->route('users')
            ->with('success', 'Usuario eliminado');
    }
}
