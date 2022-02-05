<?php

namespace EvolutionCMS\MFConfigure\Managers;


class MFCManager
{
    public function getConfig(string $tvName): array
    {
        $data['templates'] =[
            'row' => [
                'type' => 'row',
                'multi' => 'row',
            ],
        ];

        return $data;
    }
}