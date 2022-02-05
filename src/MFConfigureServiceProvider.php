<?php

namespace EvolutionCMS\MFConfigure;

use EvolutionCMS\MFConfigure\Console\MFConfigureCreateTVCommand;
use EvolutionCMS\ServiceProvider;

class MFConfigureServiceProvider extends ServiceProvider
{
    protected string $namespace = 'MFConfigure';

    protected array $commands = [
        MFConfigureCreateTVCommand::class,
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}