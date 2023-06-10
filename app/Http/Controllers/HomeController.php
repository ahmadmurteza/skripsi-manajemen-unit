<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\Warehouse;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $locations = Location::all();
        $warehouses = Warehouse::all();
        return view('home', compact('locations', 'warehouses'));
    }

    public function location()
    {
        return view('location_test.location');
    }
}
