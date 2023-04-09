<?php

namespace app\core;

class ConfigParser
{
    public static function load(): void
    {
        $configName = PROJECT_ROOT."/.env";
        if(!file_exists($configName)){
            return;
        }
        $config = file($configName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($config as $line){
            $trim = trim($line);
            if(ltrim($trim)[0] == '#'){
                continue;
            }

            $parsed = explode("=", $trim, 2);
            $_ENV[$parsed[0]] = $parsed[1];
            $_SERVER[$parsed[0]] = $parsed[1];
            putenv(rtrim($parsed[0])."=".ltrim($parsed[1]));
        }
    }
}
