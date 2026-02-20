<?php

namespace App\Console\Commands;

use App\Services\ItcService;
use Illuminate\Console\Command;

class SyncItcDriverPermits extends Command
{
    protected $signature = 'itc:sync-drivers';
    protected $description = 'Sync driver permits from ITC LES API';

    public function handle(): int
    {
        $this->info('Starting ITC driver permits sync...');

        $service = new ItcService();
        $results = $service->syncAllDriverPermits('scheduler');

        $this->info("Sync complete: {$results['success']}/{$results['total']} succeeded, {$results['failed']} failed.");

        return $results['failed'] > 0 ? Command::FAILURE : Command::SUCCESS;
    }
}
