<?php

namespace EvolutionCMS\MFConfigure\Console;

use EvolutionCMS\MFConfigure\Support\MFConfigureHelper;
use Illuminate\Console\Command;

class MakeTVCommand extends Command
{
    protected $signature = 'mfconfigure:make {--tv=}';

    protected $description = 'Create new multifields tv and config';


    public function handle(){
        if(!empty($this->option('tv'))){
            $tvName = $this->option('tv');

            (new MFConfigureHelper())->buildConfig($tvName);

            echo 'TV '.$tvName.' created successfully'.PHP_EOL;
        }else{
            echo 'please set TV name parameter --tv=YOURTVNAME example: --tv=mytvname'.PHP_EOL;
        }
    }
}