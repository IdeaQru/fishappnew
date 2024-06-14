<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanExpiredLocations extends Command
{
    protected $signature = 'clean:expired-locations';
    protected $description = 'Deletes expired locations from the database that are older than 3 months';

    public function handle()
    {
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        $deletedRows = DB::table('expired_locations')
                         ->where('created_at', '<', $threeMonthsAgo)
                         ->delete();

        $this->info("Successfully deleted {$deletedRows} expired locations.");
    }
}
