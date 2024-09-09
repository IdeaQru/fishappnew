<?php

namespace App\Http\Controllers;

use App\Models\Location; // Pastikan menggunakan model yang sesuai
use Illuminate\Http\Request; // Correct spelling of Illuminate
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Semua fungsi di controller ini memerlukan login
    }

    public function index()
    {
        // Sekarang Anda bisa aman mengakses Auth::user()->role tanpa takut error
        $user = Auth::user();

        if ($user->role === 'admin') {
            $locations = Location::all();
        } else {
            $locations = Location::where('user_id', $user->id)->get();
        }

        return view('pages.dashboard', compact('locations'));
    }




    public function indexAPI()
    {
        $locations = Location::all(); // Simulate fetching data for API, but usually, this method might just return JSON directly

        return response()->json($locations); // If this method also renders a view sometimes, adjust accordingly.
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('pages.edit', compact('location'));
    }

    public function delete($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect('/')->with('success', 'Location deleted successfully!');
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
    
        // Ambil ID pengguna yang sedang login
        $user_id = Auth::id();
    
        // Buat nama lokasi unik berdasarkan id pengguna
        $uniqueLocationName = $request->location . '-' . ($user_id * 1000);
    
        // Simpan data ke tabel locations
        Location::create([
            'lokasi' => $uniqueLocationName, // Nama lokasi unik berdasarkan user_id
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'status' => $request->status,
            'release_date' => $request->release_date,
            'expiry_date' => $request->expiry_date,
            'user_id' => $user_id, // Simpan ID pengguna yang sedang login
        ]);
    
        return redirect()->back()->with('success', 'Data lokasi berhasil disimpan dengan nama unik!');
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

        return redirect('/')->with('success', 'Location updated successfully!');
    }
}
