<?php

namespace EvolutionCMS\MFConfigure\Support;

use EvolutionCMS\Models\SiteTmplvar;

class TVHelper
{
    public function createTV($tvName)
    {
        SiteTmplvar::firstOrCreate(['type'=>'custom_tv:multifields','name'=>$tvName]);
    }
}