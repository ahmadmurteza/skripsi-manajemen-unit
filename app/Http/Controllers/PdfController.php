<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterUnit;
use App\Models\Service;
use App\Models\User;
use App\Models\Location;
use App\Models\Warehouse;
use App\Models\SparepartBeli;
use App\Models\SparepartPakai;
use App\Models\Report;
use PDF;
class PdfController extends Controller
{
    public function index() {
        return view('pdf.index');
    }

    public function printUnit() {
        $units = MasterUnit::get();
        $pdf = PDF::loadView('pdf.unitPdf', ['units'=>$units]);
     
        return $pdf->stream();
    }

    public function printService() {
        $services = Service::get();
        $pdf = PDF::loadView('pdf.servicePdf', ['services'=>$services]);
     
        return $pdf->stream();
    }

    public function printUser() {
        $users = User::join('lokasi', 'users.lokasi_id', '=', 'lokasi.id')->select('users.*', 'lokasi.nama_lokasi')->get();
        $pdf = PDF::loadView('pdf.userPdf', ['users'=>$users]);
     
        return $pdf->stream();
    }

    public function printLokasi() {
        $locations = Location::all();
        $pdf = PDF::loadView('pdf.locationPdf', ['locations'=>$locations]);
     
        return $pdf->stream();
    }

    public function printGudang() {
        $warehouses = Warehouse::all();
        $pdf = PDF::loadView('pdf.warehousePdf', ['warehouses'=>$warehouses]);
     
        return $pdf->stream();
    }

    public function printPembelian() {
        $spareparts = SparepartBeli::join('gudang_sparepart', 'sparepart_beli.gudang_sparepart_id', '=', 'gudang_sparepart.id')
        ->select('sparepart_beli.*', 'gudang_sparepart.nama_gudang')
        ->get();
        $pdf = PDF::loadView('pdf.spbeliPdf', ['spareparts'=>$spareparts]);
     
        return $pdf->stream();
    }

    public function printPenggunaan() {
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
        $pdf = PDF::loadView('pdf.sppakaiPdf', ['spareparts'=>$spareparts]);
     
        return $pdf->stream();
    }

    public function printRusak() {
        $reports = Report::join('lokasi', 'report.lokasi_id', '=', 'lokasi.id')
        ->join('master_unit', 'report.master_unit_id', '=', 'master_unit.id')
        ->select(
            'report.*',
            'lokasi.nama_lokasi',
            'master_unit.nomer_lambung'
        )
        ->get();

        $pdf = PDF::loadView('pdf.reportPdf', ['reports'=>$reports]);
     
        return $pdf->stream();
    }
}
