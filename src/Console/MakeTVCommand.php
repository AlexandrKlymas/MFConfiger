<?php

namespace EvolutionCMS\MFConfiger\Console;

use EvolutionCMS\Models\SiteTmplvar;

class MakeTVCommand extends \Illuminate\Console\Command
{
    protected $signature = 'mfconfiger:make {--tv=}';

    protected $description = 'Create new multifields tv and config';


    public function handle(){
        if(!empty($this->option('tv'))){
            SiteTmplvar::firstOrCreate(['type'=>'custom_tv:multifields','name'=>$this->option('tv')]);
        }else{
            echo 'please set TV name parameter --tv=YOURTVNAME example: --tv=mytv'.PHP_EOL;
        }
    }
}