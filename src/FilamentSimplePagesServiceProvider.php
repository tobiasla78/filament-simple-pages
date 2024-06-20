<?php

namespace Tobiasla78\FilamentSimplePages;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tobiasla78\FilamentSimplePages\Commands\FilamentSimplePagesCommand;
use Tobiasla78\FilamentSimplePages\Testing\TestsFilamentSimplePages;

class FilamentSimplePagesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-simple-pages';

    public static string $viewNamespace = 'filament-simple-pages';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasViews();

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {

    }

    protected function getAssetPackageName(): ?string
    {
        return 'tobiasla78/filament-simple-pages';
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-simple-pages_table',
        ];
    }
}
