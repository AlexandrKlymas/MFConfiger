<?php

namespace EvolutionCMS\MFConfigure\Support;

class MFCHelper
{
    protected string $mfConfigPath;
    protected string $tvNamePlaceholder;
    protected string $configExpPath;
    protected TVHelper $tvHelper;

    public function __construct()
    {
        $this->setMFConfigPath(MFCConfig::getMFTVsPath());
        $this->tvNamePlaceholder = MFCConfig::getTVPlaceholder();
        $this->configExpPath = MFCConfig::getFilesPath().'configExample.php';
        $this->tvHelper = new TVHelper();
    }

    public function setMFConfigPath(string $mfConfigPath)
    {
        $this->mfConfigPath = $mfConfigPath;
    }

    public function getMFConfigPath(): string
    {
        return $this->mfConfigPath;
    }

    public function buildConfig(string $tvName, string $tvManagerClassName)
    {
        $this->createTV($tvName);
        $this->createConfig($tvName,$tvManagerClassName);
    }

    protected function createConfig(string $tvName,string $tvManagerClassName)
    {
        file_put_contents(
            MFCConfig::getMFTVsPath().$tvName.'.php',
            '<?php . \n \n (new '.$tvManagerClassName.'())->getConfig(basename(__FILE__,".php"));'
        );
    }

    protected function createTV(string $tvName)
    {
        $this->tvHelper->createTV($tvName);
    }
}