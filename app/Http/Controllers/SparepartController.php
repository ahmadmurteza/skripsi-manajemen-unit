<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

use App\Models\Sparepart;

class SparepartController extends Controller
{
    public function index() {
        $locations = Location::all();
        return view('location.index', compact('locations'));
    }

    public function create() {
        return view('location.create');
    }

    public function store(Request $request) {
        Location::create([
            'nama_lokasi' => $request->nama_lokasi,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'radius' => $request->radius,
        ]);

        return redirect()->route('location')->with('success', 'Berhasil menambah lokasi baru');
    }

    public function edit($id) {
        $location = Location::find($id);
        return view('location.edit', compact('location'));
    }

    public function update(Request $request, $id) {
        $location = Location::find($id);
        $location->nama_lokasi = $request->nama_lokasi;
        $location->radius = $request->radius;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;

        $location->save();

        return redirect()->route('location')->with('success', 'Berhasil memperbaharui lokasi');
    }

    public function delete($id) {
        Location::find($id)->delete();
        return redirect()->route('location')->with('success', 'Berhasil menghapus user');
    }
}
