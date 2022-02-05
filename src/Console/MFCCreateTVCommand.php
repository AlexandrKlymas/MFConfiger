<?php

namespace EvolutionCMS\MFConfigure\Console;

use EvolutionCMS\MFConfigure\Support\MFCHelper;
use Illuminate\Console\Command;

class MFCCreateTVCommand extends Command
{
    protected $signature = 'mfc:createtv {--tv=} {--manager=}';

    protected $description = 'Create new multifields tv and config';


    public function handle(){
        if(!empty($this->option('tv'))
            && !empty($this->option('manager'))){

            $tvName = $this->option('tv');
            $tvManagerClassName = $this->option('manager');

            (new MFCHelper())->buildConfig(strtolower($tvName),$tvManagerClassName);

            echo 'TV '.$tvName.' created successfully'.PHP_EOL;
        }else{
            echo 'please set TV name & TVManager class name.'.PHP_EOL
                .'example: --tv=mytvname --manager=\\EvolutionCMS\\MFConfigure\\Managers\\MFCManager'.PHP_EOL;
        }
    }
}