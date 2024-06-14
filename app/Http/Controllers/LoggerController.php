<?php

namespace App\Http\Controllers;

use App\Models\ExpiredLocation;
use Illuminate\Http\Request; // Pastikan untuk mengimport model ini

class LoggerController extends Controller
{
    public function getExpiredData(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $totalPotensial = ExpiredLocation::where('status', 'potensial')
                                        ->whereMonth('expiry_date', '=', $month)
                                        ->whereYear('expiry_date', '=', $year)
                                        ->count();

        $totalKurangPotensial = ExpiredLocation::where('status', 'kurangpotensial')
                                              ->whereMonth('expiry_date', '=', $month)
                                              ->whereYear('expiry_date', '=', $year)
                                              ->count();

        return response()->json([
            'totalPotensial' => $totalPotensial,
            'totalKurangPotensial' => $totalKurangPotensial,
        ]);
    }
}
