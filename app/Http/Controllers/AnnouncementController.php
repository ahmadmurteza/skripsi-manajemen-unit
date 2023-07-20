<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index() {
        $annauncements = Announcement::all()->sortByDesc("created_at");
        return view('annauncement.index', compact("annauncements"));
    }
}
