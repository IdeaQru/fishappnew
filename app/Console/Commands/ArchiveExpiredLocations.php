<?php

namespace App\Console\Commands;

use App\Services\LocationService;
use Illuminate\Console\Command;

class ArchiveExpiredLocations extends Command
{
    protected $signature = 'locations:archive-expired';
    protected $description = 'Archive expired locations';

    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        parent::__construct();
        $this->locationService = $locationService;
    }

    public function handle()
    {
        $this->locationService->archiveExpiredLocations();
        $this->info('Expired locations have been archived.');
    }
}
