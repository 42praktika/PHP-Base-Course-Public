<?php

namespace app\core;

class ConfigParser {
    public static $config;

    public static function load()
    {
        $file = "config.xml";
        $xmlString = file_get_contents($file);
        $xml = simplexml_load_string($xmlString);
        self::$config = array();
        foreach ($xml as $key => $value) {
            self::$config[$key] = (string) $value;
        }
        return true;
    }
}