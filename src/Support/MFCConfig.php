<?php

namespace EvolutionCMS\MFConfigure\Support;

class MFCConfig
{
    public static function getMFTVsPath(): string
    {
        return MODX_BASE_PATH.'/assets/plugins/multifields/config/';
    }

    public static function getFilesPath():string
    {
        return __DIR__.'/files/';
    }

    public static function getTVPlaceholder(): string
    {
        return '[+TV_NAME+]';
    }
}