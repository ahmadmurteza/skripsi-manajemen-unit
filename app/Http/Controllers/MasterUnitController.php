<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasterUnit;
use App\Models\Location;
use App\Models\Service;

class MasterUnitController extends Controller
{
    public function index() {
        $units = MasterUnit::join('lokasi', 'master_unit.lokasi_id', '=', 'lokasi.id')
        ->join('service', 'master_unit.hm_service_id', '=', 'service.id')
        ->select(
            'master_unit.*',
            'lokasi.nama_lokasi',
            'service.hm AS hm_triger'
        )
        ->get();


        return view('report.index', compact('units'));
    }

    public function create() {
        $services = Service::all();
        $locations = Location::all();
        return view('master_unit.create', compact('services', 'locations'));
    }

    public function store(Request $request) {
        MasterUnit::create([
            'jenis_unit' => $request->jenis_unit,
            'aset' => $request->aset,
            'nomer_serial' => $request->nomer_serial,
            'nomer_lambung' => $request->nomer_lambung,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'lokasi_id' => $request->lokasi_id,
            'hm' => $request->hm,
            'hm_service_id' => $request->hm_service_id,
        ]);

        return redirect()->route('unit')->with('success', 'Berhasil menambah unit baru');
    }

    public function edit($id) {
        $services = Service::all();
        $locations = Location::all();
        $unit = MasterUnit::find($id);
        return view('master_unit.edit', compact('services', 'locations', 'unit'));
    }

    public function update(Request $request, $id) {
        $unit = MasterUnit::find($id);

        $unit->jenis_unit = $request->jenis_unit;
        $unit->aset = $request->aset;
        $unit->nomer_serial = $request->nomer_serial;
        $unit->nomer_lambung = $request->nomer_lambung;
        $unit->status = $request->status;
        $unit->keterangan = $request->keterangan;
        $unit->lokasi_id = $request->lokasi_id;
        $unit->hm = $request->hm;
        $unit->hm_service_id = $request->hm_service_id;
        $unit->save();

        return redirect()->route('unit')->with('success', 'Berhasil memperbaharui unit');
    }

    public function delete($id) {
        MasterUnit::find($id)->delete();
        return redirect()->route('unit')->with('success', 'Berhasil menghapus unit');
    }
}
