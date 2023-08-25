<?php

namespace PsiMikroskil\Larashare\Consoles\Generators;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'create:enforcer')]
class CreateEnforcerCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'create:enforcer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new enforcer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Enforcer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/enforcer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Http\Enforcers';
    }
}