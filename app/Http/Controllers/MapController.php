<?php

namespace App\Http\Controllers;

use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Laravel 7+ HTTP Client facade

class MapController extends Controller
{
    public function index()
    {
        // $locations = Location::all(); // Ambil semua lokasi dari database

        return view('pages.map'); // Ganti 'dashboard' dengan path view yang benar jika perlu
    }

    public function showMap()
    {
        $datall = Location::all(); // Fetch all locations from the database

        return response()->json($datall); // If this method also renders a view sometimes, adjust accordingly.
    }


}
