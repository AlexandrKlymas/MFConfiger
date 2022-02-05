<?php

namespace EvolutionCMS\MFConfigure\Managers;


use EvolutionCMS\MFConfigure\Support\MFCConfig;

class MFCManager
{
    public function getConfig(string $tvName): array
    {
        return $this->baseConfig();
    }

    public function baseConfig(): array
    {
        return [
            'settings'=>[
                'view'=> 'icons',
                'toolbar' => [
                    'export' => true,
                    'import' => true,
                    'fullscreen' => true,
                ],
            ],
            'templates'=>[],
        ];
    }
}