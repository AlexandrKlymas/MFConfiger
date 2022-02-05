<?php

namespace EvolutionCMS\MFConfigure\Support;

use EvolutionCMS\Models\SiteTmplvar;
use Exception;

class MFCHelper
{
    protected string $pluginsPath = MODX_BASE_PATH.'/assets/plugins/';
    protected string $configPath = '';
    protected string $pluginName = '';

    public function __construct(string $pluginName)
    {
        $this->pluginName = $pluginName;
        $this->configPath = $this->pluginsPath . $this->pluginName.'/config/';
    }

    /**
     * @throws Exception
     */
    public function buildConfig(string $tvName, string $tvManagerClassName, bool $forced)
    {
        $this->createTV($tvName,$forced);
        $this->createConfig($tvName,$tvManagerClassName,$forced);
    }

    /**
     * @throws Exception
     */
    protected function createConfig(string $tvName, string $tvManagerClassName, bool $forced = false)
    {
        $newConfigPath = $this->configPath.$tvName.'.php';
        if(!file_exists($newConfigPath) || $forced){
            file_put_contents(
                $newConfigPath,
                '<?php '.PHP_EOL.PHP_EOL
                .'return (new '.$tvManagerClassName.'())->getConfig(basename(__FILE__,\'.php\'));'
            );
        }else{
            throw new Exception($tvName.' config already exist');
        }
    }

    /**
     * @throws Exception
     */
    protected function createTV(string $tvName, bool $forced = false)
    {
        if(SiteTmplvar::where('name',$tvName)->doesntExist()){
            SiteTmplvar::create(['type'=>'custom_tv:'.$this->pluginName,'name'=>$tvName]);
        }else{
            if($forced){
                SiteTmplvar::where('name',$tvName)->update(['type'=>'custom_tv:'.$this->pluginName]);
            }else{
                throw new Exception($tvName.' tv already exist');
            }
        }
    }
}