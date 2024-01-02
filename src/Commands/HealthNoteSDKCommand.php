<?php

namespace ChrisReedIO\HealthNoteSDK\Commands;

use Illuminate\Console\Command;

class HealthNoteSDKCommand extends Command
{
    public $signature = 'laravel-healthnote-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
