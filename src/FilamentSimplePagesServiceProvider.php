<?php

namespace Tobiasla78\FilamentSimplePages;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Routing\Router;
use Tobiasla78\FilamentSimplePages\Http\Middleware\IndexMiddleware;

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
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
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
            'create_filament_simple_pages_table',
        ];
    }
}
