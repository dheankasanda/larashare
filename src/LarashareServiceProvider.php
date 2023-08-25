<?php

namespace PsiMikroskil\Larashare;

use Illuminate\Support\ServiceProvider;
use PsiMikroskil\Larashare\Consoles\Generators\CreateServiceCommand;

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
            CreateServiceCommand::class
        ]);
    }
}