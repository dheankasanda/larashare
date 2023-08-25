<?php

namespace PsiMikroskil\Larashare\Consoles\Utility;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'create:feature')]
class CreateFeatureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:feature {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new feature with service, request, and enforcer';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = ucfirst($this->argument('name'));

        $this->call('create:service', [
            'name' => $name . 'Service'
        ]);
        $this->call('create:request', [
            'name' => $name . 'Request'
        ]);
        $this->call('create:enforcer', [
            'name' => $name . 'Enforcer'
        ]);
    }
}