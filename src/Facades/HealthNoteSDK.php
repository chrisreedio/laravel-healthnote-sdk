<?php

namespace ChrisReedIO\HealthNoteSDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\HealthNoteSDK\HealthNoteSDK
 */
class HealthNoteSDK extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ChrisReedIO\HealthNoteSDK\HealthNoteSDK::class;
    }
}
