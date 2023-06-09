<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::join('lokasi', 'users.lokasi_id', '=', 'lokasi.id')->select('users.*', 'lokasi.nama_lokasi')->get();
        return view('user.index', compact('users'));
    }

    public function create() {
        $locations = Location::all();
        return view('user.create', compact('locations'));
    }

    public function store(Request $request) {
        User::create([
            'lokasi_id' => $request->lokasi_id,
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
        $locations = Location::all();
        return view('user.edit', compact('user', 'locations'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->lokasi_id = $request->lokasi_id;
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
