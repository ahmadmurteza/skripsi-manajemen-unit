<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterUnit;
use App\Models\Location;
use App\Models\Report;
use App\Models\Discus;
use App\Models\User;

class ReportController extends Controller
{
    public function index() {
        $reports = Report::join('lokasi', 'report.lokasi_id', '=', 'lokasi.id')
        ->join('master_unit', 'report.master_unit_id', '=', 'master_unit.id')
        ->select(
            'report.*',
            'lokasi.nama_lokasi',
            'master_unit.nomer_lambung'
        )
        ->get();


        return view('report.index', compact('reports'));
    }

    public function create() {
        $units = MasterUnit::all();
        $locations = Location::all();
        return view('report.create', compact('units', 'locations'));
    }

    public function store(Request $request) {
        if($request->hasFile('foto_insiden')){
            $filenameWithExt = $request->file('foto_insiden')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_insiden')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('foto_insiden')->storeAs('public/posts_image', $filenameSimpan);
        }else{
            $path = 'noimage.jpg';
        }

        Report::create([
            'master_unit_id' => $request->master_unit_id,
            'lokasi_id' => $request->lokasi_id,
            'pengadu' => $request->pengadu,
            'kerusakan' => $request->kerusakan,
            'status' => $request->status,
            'prioritas' => $request->prioritas,
            'foto_insiden' => $path,
            'waktu_insiden' => $request->waktu_insiden,
        ]);

        return redirect()->route('report')->with('success', 'Berhasil menambah report baru');
    }

    public function edit($id) {
        $report = Report::find($id);
        $units = MasterUnit::all();
        $locations = Location::all();
        return view('report.edit', compact('report', 'units', 'locations'));
    }

    public function update(Request $request, $id) {
        
        
        


        $report = Report::find($id);
        $report->master_unit_id = $request->master_unit_id;
        $report->lokasi_id = $request->lokasi_id;
        $report->pengadu = $request->pengadu;
        $report->kerusakan = $request->kerusakan;
        $report->status = $request->status;
        $report->prioritas = $request->prioritas;
        
        if($request->hasFile('foto_insiden')){
            $filenameWithExt = $request->file('foto_insiden')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_insiden')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('foto_insiden')->storeAs('public/posts_image', $filenameSimpan);
        }else{
            $path = $report->foto_insiden;
        }
        $report->foto_insiden = $path;
        
        $report->waktu_insiden = $request->waktu_insiden;
        $report->save();

        return redirect()->route('report')->with('success', 'Berhasil memperbaharui report');
    }

    public function delete($id) {
        Report::find($id)->delete();
        return redirect()->route('report')->with('success', 'Berhasil menghapus report');
    }

    public function priority(Request $request) {
        $report = Report::find($request->id);
        $report->prioritas = $request->status;
        $report->save();
        return $report;
    }

    public function show($id) {
        $ticket = Report::find($id);
        $discus = Discus::where('ticket_id', $ticket->id)->get();
        foreach ($discus as $index => $item) {
            $discus[$index]['user'] = User::find($item->user_id);
        }
        return view('report.show', compact('ticket', 'discus'));
    }

    public function discus(Request $request) {
        Discus::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->user()->id,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah diskusi baru');
    }
}
