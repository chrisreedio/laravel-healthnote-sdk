<?php

namespace ChrisReedIO\HealthNoteSDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\HealthNoteSDK\HealthNoteConnector
 */
class HealthNoteSDK extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisReedIO\HealthNoteSDK\HealthNoteConnector::class;
    }
}
