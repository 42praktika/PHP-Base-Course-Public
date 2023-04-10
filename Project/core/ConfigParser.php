<?php

namespace app\core;

class ConfigParser
{
    public static function load(): void
    {
        if (!file_exists('config.php'))
        {
            return;
        }
        $config = require PROJECT_ROOT.'/config.php';
        self::decrypt($config);
    }

    private static function decrypt(array $arr) : void
    {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                self::decrypt($value);
            } else {
                $key = trim($key);
                $value = trim($value);
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv($key."=".$value);
            }
        }
    }
}