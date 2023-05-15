<?php

namespace app\core;

class ConfigParser
{
    public static function load() {
        $confName = PROJECT_ROOT . "/.ini";
        if (!file_exists($confName)) {
            return;
        }
        $config = file($confName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($config as $line) {
            $trim = trim($line);
            if (str_starts_with($trim, "#")) continue;
            $parsed = explode("=", $trim, 2 );
            $_ENV[$parsed[0]] = $parsed[1];
            $_SERVER[$parsed[0]] = $parsed[1];
            putenv(rtrim($parsed[0])."=".ltrim($parsed[1]));
        }
    }
}