<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    public function create() {
        return view('service.create');
    }

    public function store(Request $request) {
        Service::create([
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'sparepart' => $request->sparepart,
            'hm' => $request->hm,
            'jenis_unit' => $request->jenis_unit,
        ]);

        return redirect()->route('service')->with('success', 'Berhasil menambah service baru');
    }

    public function edit($id) {
        $service = Service::find($id);
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, $id) {
        $service = Service::find($id);

        $service->penanggung_jawab = $request->penanggung_jawab;
        $service->deskripsi = $request->deskripsi;
        $service->sparepart = $request->sparepart;
        $service->hm = $request->hm;
        $service->jenis_unit = $request->jenis_unit;

        $service->save();

        return redirect()->route('service')->with('success', 'Berhasil memperbaharui service');
    }

    public function delete($id) {
        Service::find($id)->delete();
        return redirect()->route('service')->with('success', 'Berhasil menghapus service');
    }
}
