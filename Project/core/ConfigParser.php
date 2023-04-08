<?php

namespace app\core;

class ConfigParser
{
    public static function load() {
        if (!file_exists(PROJECT_ROOT."/config.ini")) {
            return;
        }
        $config = file(PROJECT_ROOT."/config.ini", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($config as $line) {
            $line = trim($line);
            if ($line[0] == "#" || $line[0] == ";") continue;
            $parsed = explode("=", $line, 2);
            $_ENV[$parsed[0]] = $parsed[1];
            $_SERVER[$parsed[0]] = $parsed[1];
            putenv(rtrim($parsed[0])."=".ltrim($parsed[1]));
        }
    }
}
