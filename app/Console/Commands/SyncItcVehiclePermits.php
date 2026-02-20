<?php

namespace App\Console\Commands;

use App\Services\ItcService;
use Illuminate\Console\Command;

class SyncItcVehiclePermits extends Command
{
    protected $signature = 'itc:sync-vehicles';
    protected $description = 'Sync vehicle permits from ITC LES API';

    public function handle(): int
    {
        $this->info('Starting ITC vehicle permits sync...');

        $service = new ItcService();
        $results = $service->syncAllVehiclePermits('scheduler');

        $this->info("Sync complete: {$results['success']}/{$results['total']} succeeded, {$results['failed']} failed.");

        return $results['failed'] > 0 ? Command::FAILURE : Command::SUCCESS;
    }
}
