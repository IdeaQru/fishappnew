<?php

// Di dalam app/Services/LocationService.php

namespace App\Services;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationService
{
    public function archiveExpiredLocations()
    {
        $expiredLocations = Location::where('expiry_date', '<', now())->get();
        foreach ($expiredLocations as $location) {
            DB::transaction(function () use ($location) {
                DB::table('expired_locations')->insert([
                    'lokasi' => $location->lokasi,
                    'longitude' => $location->longitude,
                    'latitude' => $location->latitude,
                    'status' => $location->status,
                    'release_date' => $location->release_date,
                    'expiry_date' => $location->expiry_date,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $location->delete();
            });
        }
    }
}
