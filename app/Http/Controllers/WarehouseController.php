<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::all();
        return view('warehouse.index', compact('warehouses'));
    }

    public function create() {
        return view('warehouse.create');
    }

    public function store(Request $request) {
        Warehouse::create([
            'nama_gudang' => $request->nama_lokasi,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('warehouse')->with('success', 'Berhasil menambah gudang baru');
    }

    public function edit($id) {
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', compact('warehouse'));
    }

    public function update(Request $request, $id) {
        $warehouse = Warehouse::find($id);
        $warehouse->nama_gudang = $request->nama_gudang;
        $warehouse->longitude = $request->longitude;
        $warehouse->latitude = $request->latitude;
        $warehouse->penanggung_jawab = $request->penanggung_jawab;
        $warehouse->deskripsi = $request->deskripsi;

        $warehouse->save();

        return redirect()->route('warehouse')->with('success', 'Berhasil memperbaharui gudang');
    }

    public function delete($id) {
        Location::find($id)->delete();
        return redirect()->route('location')->with('success', 'Berhasil menghapus user');
    }
}
