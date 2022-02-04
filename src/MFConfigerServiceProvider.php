<?php

namespace EvolutionCMS\MFConfiger;

use EvolutionCMS\MFConfiger\Console\MakeTVCommand;

class MFConfigerServiceProvider extends \EvolutionCMS\ServiceProvider
{
    protected string $namespace = 'MFConfiger';

    protected $commands = [
        MakeTVCommand::class,
    ]

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