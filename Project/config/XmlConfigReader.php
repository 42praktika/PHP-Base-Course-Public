<?php

class XmlConfigReader{
    private $config;

    public function __construct($configFile) {
        $this->config = simplexml_load_file($configFile);
    }

    public function get($key) {
        $value = $this->config->{$key};
        if ($value === null) {
            throw new Exception("Ключ не найден $key");
        }
        return (string) $value;
    }

}

//Пример использования:

$config = new XmlConfigReader('config.xml');
$host = $config->get('db_host');
$username = $config->get('db_username');
$password = $config->get('db_password');