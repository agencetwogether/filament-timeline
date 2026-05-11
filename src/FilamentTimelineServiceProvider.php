<?php

namespace Agencetwogether\FilamentTimeline;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentTimelineServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-timeline')
            ->hasViews();
    }
}
