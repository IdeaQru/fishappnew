<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Persebaran Ikan - {{ $month }}/{{ $year }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        @page {
            size: A4;
            margin: 20mm;
        }
        h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        p {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }
    </style>
</head>
<body>
    <h1>Laporan Data Persebaran Ikan {{ date("F", mktime(0, 0, 0, $month, 1)) }} {{ $year }}</h1>
    <h3>Wilayah Laut Jawa</h3>
    <p>Total Lokasi Potensial: {{ $totalPotensial }}</p>
    <p>Total Prediksi Berpotensi: {{ $totalPrediksiBerpotensi }}</p>
    <p>Total Lokasi Potensial Sedang: {{ $totalKurangPotensial }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Status</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $location->lokasi }}</td>
                    <td>{{ $location->latitude }}</td>
                    <td>{{ $location->longitude }}</td>
                    <td>{{ $location->status }}</td>
                    <td>{{ $location->expiry_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
