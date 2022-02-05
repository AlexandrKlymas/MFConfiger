<?php

namespace EvolutionCMS\MFConfigure\Console;

use EvolutionCMS\MFConfigure\Support\MFCHelper;
use Exception;
use Illuminate\Console\Command;

class MFConfigureCreateTVCommand extends Command
{
    protected $signature = 'mfc:create {tv_name} {manager_class_name} {--js} {--f}';

    protected $description = 'Create new multifields(js) tv and config';


    /**
     * @throws Exception
     */
    public function handle(){

        $this->line('');

        $js = $this->option('js');
        $forced = $this->option('f');

        if($js){
            $this->line('multifieldsjs plugin selected');
            $this->line('');
        }

        if($forced){
            $this->line('forced mode detected');
            $this->line('');
        }

        $tvName = $this->argument('tv_name');
        $tvManagerClassName = $this->argument('manager_class_name');
        $mfPluginName = $js?'multifieldsjs':'multifields';

        try{
            (new MFCHelper($mfPluginName))->buildConfig(strtolower($tvName),$tvManagerClassName,$forced);
        }catch (Exception $e){
            $this->line($e->getMessage());
            die();
        }

        $this->line('TV '.$tvName.' created successfully!');
    }
}