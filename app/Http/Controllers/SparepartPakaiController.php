<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SparepartPakai;
use App\Models\SparepartBeli;
use App\Models\Warehouse;

class SparepartPakaiController extends Controller
{
    public function index() {
        $spareparts = SparepartPakai::join('sparepart_beli', 'sparepart_pakai.sparepart_beli_id', '=', 'sparepart_beli.id')
        ->join('gudang_sparepart', 'sparepart_beli.gudang_sparepart_id', '=', 'gudang_sparepart.id')
        ->select(
            'sparepart_pakai.*', 
            'sparepart_beli.gudang_sparepart_id',
            'gudang_sparepart.nama_gudang',
            'sparepart_beli.deskripsi',
            'sparepart_beli.nomor_part',
            'sparepart_beli.harga_satuan',
            'sparepart_beli.suplier',
            'sparepart_beli.nomor_po',
        )
        ->get();

        foreach ($spareparts as $sparepart) {
            $sparepart['total'] = $sparepart->jumlah * $sparepart->harga_satuan;
        }
        return view('sparepart_pakai.index', compact('spareparts'));
    }

    public function create() {
        $sparepartBeli = SparepartBeli::all();
        return view('sparepart_pakai.create', compact('sparepartBeli'));
    }

    public function store(Request $request) {

        $sparepartBeli = SparepartBeli::select('jumlah')->where('id', $request->sparepart_beli_id)->first();
        $sparepartJumlahPakai =  SparepartPakai::where('sparepart_beli_id', $request->sparepart_beli_id)->sum('jumlah');
        

        if ($sparepartBeli->jumlah  < ($sparepartJumlahPakai + $request->jumlah)) {
            return redirect()->back()->with('danger', 'Gagal menggunakan sparepart karena jumlah sparepart kurang. Silahkan cek pembelian sparepart untuk ketersediaan');
        }

        SparepartPakai::create([
            'sparepart_beli_id' => $request->sparepart_beli_id,
            'tanggal_dipakai' => $request->tanggal_dipakai,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
            'status' => $request->status,
        ]);

        return redirect()->route('sparepart-pakai')->with('success', 'Berhasil menambah penggunaan sparepart baru');
    }

    public function edit($id) {
        $sparepart = SparepartPakai::find($id);
        $sparepartBeli = SparepartBeli::all();
        return view('sparepart_pakai.edit', compact('sparepart', 'sparepartBeli'));
    }

    public function update(Request $request, $id) {

        $sparepartBeli = SparepartBeli::select('jumlah')->where('id', $request->sparepart_beli_id)->first();
        $sparepartJumlahPakai =  SparepartPakai::where('sparepart_beli_id', $request->sparepart_beli_id)->sum('jumlah');
        $sparepart = SparepartPakai::find($id);
        
        $sparepartJmlSkrg = $sparepartJumlahPakai - $sparepart->jumlah;

        
        if ($sparepartBeli->jumlah  < ($sparepartJmlSkrg + $request->jumlah)) {
            return redirect()->back()->with('danger', 'Gagal menggunakan sparepart karena jumlah sparepart kurang. Silahkan cek pembelian sparepart untuk ketersediaan');
        }

        $sparepart->sparepart_beli_id = $request->sparepart_beli_id;
        $sparepart->tanggal_dipakai = $request->tanggal_dipakai;
        $sparepart->jumlah = $request->jumlah;
        $sparepart->penerima = $request->penerima;
        $sparepart->status = $request->status;

        $sparepart->save();

        return redirect()->route('sparepart-pakai')->with('success', 'Berhasil memperbaharui penggunaan sparepart');
    }

    public function delete($id) {
        SparepartPakai::find($id)->delete();
        return redirect()->route('sparepart-pakai')->with('success', 'Berhasil menghapus penggunaan sparepart');
    }
}
