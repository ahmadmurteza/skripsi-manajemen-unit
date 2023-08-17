<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

use PDF;
class PasienController extends Controller
{
    public function index() {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    public function create() {
        return view('pasien.create');
    }

    public function store(Request $request) {
        Pasien::create([

            'kode_pasien'=> $request->kode_pasien,
            'nama_pasien'=> $request->nama_pasien,
            'alamat'=> $request->alamat,
            'no_hp'=> $request->no_hp,
        ]);

        return redirect()->route('pasien')->with('success', 'Berhasil menambah pasien baru');
    }

    public function edit($id) {
        $pasien = Pasien::find($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id) {
        $pasien = Pasien::find($id);

        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;

        $pasien->save();

        return redirect()->route('pasien')->with('success', 'Berhasil memperbaharui pasien');
    }

    public function delete($id) {
        Pasien::find($id)->delete();
        return redirect()->route('pasien')->with('success', 'Berhasil menghapus pasien');
    }

    public function cetak() {
        $pasiens = Pasien::get();
        $pdf = PDF::loadView('pdf.pasienPdf', ['pasiens'=>$pasiens]);
     
        return $pdf->stream();
    }
}
