<?php

namespace PsiMikroskil\Larashare;

use Illuminate\Support\ServiceProvider;
use PsiMikroskil\Larashare\Consoles\Generators\CreateEnforcerCommand;
use PsiMikroskil\Larashare\Consoles\Generators\CreateRepositoryCommand;
use PsiMikroskil\Larashare\Consoles\Generators\CreateRequestCommand;
use PsiMikroskil\Larashare\Consoles\Generators\CreateServiceCommand;
use PsiMikroskil\Larashare\Consoles\Utility\CreateFeatureCommand;

class LarashareServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->commands([
            CreateServiceCommand::class,
            CreateRequestCommand::class,
            CreateEnforcerCommand::class,
            CreateRepositoryCommand::class,

            CreateFeatureCommand::class
        ]);
    }
}