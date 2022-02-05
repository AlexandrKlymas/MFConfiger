<?php

namespace EvolutionCMS\MFConfigure\Support;

class MFConfigureHelper
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

    public function buildConfig(string $tvName)
    {
        $this->createTV($tvName);
        $this->createTVDir($tvName);
        $this->createConfig($tvName);
    }

    protected function createTVDir($tvName)
    {
        $tvPath = $this->mfConfigPath.$tvName;

        $dirExist = file_exists($tvPath);

        if(!$dirExist){
            mkdir($tvPath,0644);
        }
    }

    protected function createConfig($tvName)
    {
        file_put_contents(
            MFCConfig::getMFTVsPath().$tvName.'.php',
            $this->replaceTVNamePlaceholder(
                $tvName,
                file_get_contents($this->configExpPath),
                $this->tvNamePlaceholder
            )
        );
    }

    protected function replaceTVNamePlaceholder($tvName,$configExampleContents, $tvNamePlaceholder)
    {
        return str_replace($tvNamePlaceholder,$tvName,$configExampleContents);
    }

    protected function createTV(string $tvName)
    {
        $this->tvHelper->createTV($tvName);
    }
}