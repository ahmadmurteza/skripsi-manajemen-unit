<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'role' => $request->role,
            'no_wa' => $request->no_wa,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user')->with('success', 'Berhasil menambah user baru');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->role = $request->role;
        $user->no_wa = $request->no_wa;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user')->with('success', 'Berhasil memperbaharui user');
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect()->route('user')->with('success', 'Berhasil menghapus user');
    }
}
