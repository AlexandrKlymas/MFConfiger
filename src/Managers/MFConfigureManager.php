<?php

namespace EvolutionCMS\MFConfigure\Services;


use EvolutionCMS\MFConfigure\Support\MFCConfig;

class MFConfigureService
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