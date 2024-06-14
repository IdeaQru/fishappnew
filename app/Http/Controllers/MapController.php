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

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'release_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:release_date',
        ]);

        $location = new Location();
        $location->lokasi = $request->location;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->status = $request->status;
        $location->release_date = $request->release_date;
        $location->expiry_date = $request->expiry_date;
        $location->save();

        return redirect()->back()->with('success', 'Task has been added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lokasi' => 'required|string|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'release_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:release_date',
        ]);

        $location = Location::findOrFail($id);
        $location->lokasi = $request->lokasi;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->status = $request->status;
        $location->release_date = $request->release_date;
        $location->expiry_date = $request->expiry_date;
        $location->save();

        return redirect('/dashboard')->with('success', 'Location updated successfully!');
    }
}
