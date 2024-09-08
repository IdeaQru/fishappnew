<?php

namespace App\Http\Controllers;

use App\Models\ExpiredLocation;
use Illuminate\Http\Request;
use PDF; // Pastikan ini diimpor jika Anda menggunakan facade PDF

class PDFController extends Controller
{
    public function downloadPDF(Request $request)
    {
        $month = $request->query('month');
        $year = $request->query('year');
        $locations = $this->getData($month, $year); // Ini harus menyimpan hasil getData ke dalam $locations

        // Menghitung jumlah lokasi berdasarkan status menggunakan data yang sudah diambil
        $counts = $locations->groupBy('status')->map(function ($items, $key) {
            return $items->count();
        });

        $totalPotensial = $counts['potensial'] ?? 0;
        $totalKurangPotensial = $counts['kurangpotensial'] ?? 0;
        $totalPrediksiBerpotensi = $counts['prediksiberpotensi'] ?? 0;

        // Mengenerate PDF
        $pdf = \PDF::loadView('pdf.template', [
            'locations' => $locations,
            'totalPotensial' => $totalPotensial,
            'totalKurangPotensial' => $totalKurangPotensial,
            'totalPrediksiBerpotensi' => $totalPrediksiBerpotensi,
            'month' => $month,
            'year' => $year,
        ]);
        $months = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $monthName = $months[(int)$month];
        return $pdf->download("DATA_{$monthName}_{$year}.pdf");
    }

    protected function getData($month, $year)
    {
        // Mengambil data dari tabel expired_locations berdasarkan expiry_date
        return ExpiredLocation::whereYear('expiry_date', $year)
                              ->whereMonth('expiry_date', $month)
                              ->orderBy('expiry_date', 'asc')  // Menambahkan pengurutan
                              ->get();
    }
}
