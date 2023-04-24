<?php

namespace app\core;

use function PHPUnit\Framework\isJson;

class ConfigParser
{
    public static function load(): void
    {
        $configName = PROJECT_ROOT."/config.json";
        if(!file_exists($configName)){
            return;
        }
        $configFileContent = file_get_contents($configName);

//        if(!isJson($configFileContent)){
//            return;
//        }

        $configJson = json_decode($configFileContent, true);

        foreach ($configJson as $key => $value){
            $cleanedKey = ltrim(rtrim($key));
            $cleanedValue = ltrim(rtrim($value));

            $_ENV[$cleanedKey] = $cleanedValue;
            $_SERVER[$cleanedKey] = $cleanedValue;
            putenv($cleanedKey."=".$cleanedValue);
        }
    }
}
