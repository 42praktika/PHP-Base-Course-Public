<?php

namespace app\core;

class ConfigParser {
    private $xml; // Объект SimpleXMLElement

    public function __construct($file) {
        if (file_exists('config.xml')) {
            $this->xml = simplexml_load_file($file);
        } else {
            echo ("Такого файла не существует");
        }
    }

    public function load(): array
    {
        $config = array();
        foreach ($this->xml as $key => $value) {
            $config[$key] = (string) $value;
        }
        return $config;
    }
}