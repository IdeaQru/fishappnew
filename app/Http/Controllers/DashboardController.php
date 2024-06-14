<?php

namespace App\Http\Controllers;

use App\Models\Location; // Pastikan menggunakan model yang sesuai

class DashboardController extends Controller
{
    public function index()
    {
        $locations = Location::all(); // Retrieve all locations

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

        return redirect('/dashboard')->with('success', 'Location deleted successfully!');
    }
}
