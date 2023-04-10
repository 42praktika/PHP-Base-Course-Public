<?php

namespace app\core;

class ConfigParser {
    private $config;

    public function parse($file): void
    {
        $this->config = parse_ini_file($file, true);
    }

    public function getConfig() {
        return $this->config;
    }
}