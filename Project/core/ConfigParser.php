<?php

namespace app\core;

class ConfigParser
{
    public static function load() {
        $confName = PROJECT_ROOT."/config.json";
        if(!file_exists($confName)){
            return;
        };
        $config = file_get_contents($confName);
        $parsed = json_decode($config,true);
        foreach ($parsed as $item => $items) {
            if (is_array($item)) {
                foreach ($items as $key => $value) {
                    $_ENV[$item][$key] = $value;
                    $_SERVER[$item][$key] = $value;

                }
            } else {
                $_ENV[$item] = $items;
                $_SERVER[$item] = $items;
            }
        }
    }
}