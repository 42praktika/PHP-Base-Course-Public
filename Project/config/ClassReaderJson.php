<?php

class ClassReaderJson
{
    private $config;

    public function __construct($configFilePath)
    {
        $configFile = file_get_contents($configFilePath);
        $this->config = json_decode($configFile, true);
    }

    public function get($key)
    {
        return $this->config[$key] ?? null;
    }
}

$config = new ClassReaderJson('file.json');
$databaseHost = $config->get('database.host');
$databaseName = $config->get('database.name');

