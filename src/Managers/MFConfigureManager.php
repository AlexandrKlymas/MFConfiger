<?php

namespace EvolutionCMS\MFConfigure\Managers;


use EvolutionCMS\MFConfigure\Support\MFCConfig;

class MFConfigureManager
{
    public function getConfig(string $tvName): array
    {
        return $this->baseConfig();
    }

    public function baseConfig(): array
    {
        return include MFCConfig::getFilesPath().'baseConfig.php';
    }
}