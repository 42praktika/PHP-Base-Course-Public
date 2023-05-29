<?php

namespace app\core;

use app\exceptions\FileException;
use RuntimeException;

class ConfigParser
{
    /**
     * @throws FileException
     */
    public static function load() {
        $confName = PROJECT_ROOT."/config.json";
        if(!file_exists($confName)){
            throw new FileException("Configuration file not found");
        };
        try {
            $config = file_get_contents($confName);
        } catch (\Exception $e) {
            Application::$app->getLogger()->error('Error occurred while reading configuration file: ' . $e->getMessage());
            throw new RuntimeException('Failed to read configuration file.',  $e);
        }
        try {
            $parsed = json_decode($config, true);
        } catch (\Exception $e) {
            Application::$app->getLogger()->error('Error occurred while parsing configuration JSON: ' . $e->getMessage());
            throw new RuntimeException('Failed to parse configuration JSON.',  $e);
        }
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