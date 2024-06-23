<?php

namespace Tobiasla78\FilamentSimplePages;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasViews()
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->askToRunMigrations();
            });

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        $this->publishes([
            __DIR__.'/../stubs/SimplePageResource.php.stub' => app_path() . '/Filament/Resources/SimplePageResource.php',
            __DIR__.'/../stubs/SimplePageResource/Pages/CreateSimplePage.php.stub' => app_path() . '/Filament/Resources/SimplePageResource/CreateSimplePage.php',
            __DIR__.'/../stubs/SimplePageResource/Pages/EditSimplePage.php.stub' => app_path() . '/Filament/Resources/SimplePageResource/EditSimplePage.php',
            __DIR__.'/../stubs/SimplePageResource/Pages/ListSimplePages.php.stub' => app_path() . '/Filament/Resources/SimplePageResource/ListSimplePages.php',
        ], 'filament-simple-pages-resources');
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
            'add_image_to_filament-simple-pages_table'
        ];
    }
}
