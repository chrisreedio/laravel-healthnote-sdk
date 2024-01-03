<?php

namespace ChrisReedIO\HealthNoteSDK;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ChrisReedIO\HealthNoteSDK\Commands\HealthNoteSDKCommand;

class HealthNoteSDKServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-healthnote-sdk')
            ->hasConfigFile('healthnote-sdk')
            // ->hasViews()
            // ->hasMigration('create_laravel-healthnote-sdk_table')
            ->hasCommand(HealthNoteSDKCommand::class);
    }
}
