<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\MasterUnit;
use App\Models\Warehouse;
use App\Models\User;
use App\Models\Report;
use App\Models\Announcement;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $locations = Location::all();
        $warehouses = Warehouse::all();
        $userTotal = User::count();
        $units = MasterUnit::all();
        return view('home', compact('locations', 'warehouses', 'userTotal', 'units'));
    }

    public function location()
    {
        $units = MasterUnit::all();
        $locations = Location::all();
        return view('location_test.location', compact('units', 'locations'));
    }

    public function incident(Request $request) {
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
            'status' => "menunggu",
            'prioritas' => "rendah",
            'foto_insiden' => $path,
            'waktu_insiden' => now(),
        ]);

        $unit = MasterUnit::find($request->master_unit_id);
        $unit->longitude = $request->longitude;
        $unit->latitude = $request->latitude;
        $unit->status = 'breakdown';
        $unit->save();

        $users = User::where('role', 'planner')->get();
        foreach ($users as $user) {
            Http::post('http://localhost:8080/message', [
                'phoneNumber' => $user->no_wa,
                'message' => 'Laporan kerusakan unit '. $unit->nomer_lambung . '. Cek APUR untuk melihat detail kerusakan'
            ]);
        }

        Announcement::create([
            "deskripsi" => "Pemberitahuan unit ". $unit->nomer_lambung ." dengan kerusakan ". $request->kerusakan ."telah dikirim kesemua planner"
        ]);


        return redirect()->back()->with('success', 'Laporan telah dikirimkan ke planner');
    }
}
