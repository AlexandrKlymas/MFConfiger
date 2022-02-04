<?php

namespace EvolutionCMS\MFConfiger;

use EvolutionCMS\MFConfiger\Console\MakeTVCommand;

class MFConfigerServiceProvider extends \EvolutionCMS\ServiceProvider
{
    protected string $namespace = 'MFConfiger';

    protected $commands = [
        MakeTVCommand::class,
    ]
}