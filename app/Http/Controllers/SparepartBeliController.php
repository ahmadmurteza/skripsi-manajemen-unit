<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SparepartBeli;
use App\Models\SparepartPakai;
use App\Models\Warehouse;

class SparepartBeliController extends Controller
{
    public function index() {
        $spareparts = SparepartBeli::join('gudang_sparepart', 'sparepart_beli.gudang_sparepart_id', '=', 'gudang_sparepart.id')
        ->select('sparepart_beli.*', 'gudang_sparepart.nama_gudang')
        ->get();
        return view('sparepart_beli.index', compact('spareparts'));
    }

    public function create() {
        $warehouses = Warehouse::all();
        return view('sparepart_beli.create', compact('warehouses'));
    }

    public function store(Request $request) {
        SparepartBeli::create([
            'gudang_sparepart_id' => $request->gudang_sparepart_id,
            'tanggal_diterima' => $request->tanggal_diterima,
            'deskripsi' => $request->deskripsi,
            'nomor_part' => $request->nomor_part,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->harga_satuan * $request->jumlah,
            'suplier' => $request->suplier,
            'nomor_po' => $request->nomor_po,
            'penerima' => $request->penerima,
            'status' => $request->status,
        ]);

        return redirect()->route('sparepart-beli')->with('success', 'Berhasil menambah pembelian sparepart baru');
    }

    public function edit($id) {
        $sparepart = SparepartBeli::find($id);
        $warehouses = Warehouse::all();
        return view('sparepart_beli.edit', compact('sparepart', 'warehouses'));
    }

    public function update(Request $request, $id) {

        $sparepartJumlahPakai =  SparepartPakai::where('sparepart_beli_id', $id)->sum('jumlah');
        $sparepart = SparepartBeli::find($id);

        if ($request->jumlah < $sparepartJumlahPakai) {
            return redirect()->back()->with('danger', 'Gagal mengubah pembelian sparepart karena sudah digunkanan beberapa. Seusaikan dengan stok dengan cek penggunaan sparepart');
        }
        
        $sparepart->gudang_sparepart_id = $request->gudang_sparepart_id;
        $sparepart->tanggal_diterima = $request->tanggal_diterima;
        $sparepart->deskripsi = $request->deskripsi;
        $sparepart->nomor_part = $request->nomor_part;
        $sparepart->jumlah = $request->jumlah;
        $sparepart->harga_satuan = $request->harga_satuan;
        $sparepart->total = $request->harga_satuan * $request->jumlah;
        $sparepart->suplier = $request->suplier;
        $sparepart->nomor_po = $request->nomor_po;
        $sparepart->penerima = $request->penerima;
        $sparepart->status = $request->status;

        $sparepart->save();

        return redirect()->route('sparepart-beli')->with('success', 'Berhasil memperbaharui pembelian sparepart');
    }

    public function delete($id) {
        SparepartBeli::find($id)->delete();
        return redirect()->route('sparepart-beli')->with('success', 'Berhasil menghapus pembelian sparepart');
    }
}
