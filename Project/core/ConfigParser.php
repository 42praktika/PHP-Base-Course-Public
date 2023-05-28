<?php

namespace app\core;

class ConfigParser
{
    public static function load() {
        $configJsonName = PROJECT_ROOT."/config.json";

        $configFileContent = file_get_contents($configJsonName);
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