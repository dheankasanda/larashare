<?php

namespace PsiMikroskil\Larashare\Consoles\Generators;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'create:auth-driver')]
class CreateAuthDriverCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:auth-driver {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new authentication driver';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Authentication Driver';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/auth-driver.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Auth\Drivers';
    }
}