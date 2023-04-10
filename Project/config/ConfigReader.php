<?php

class ConfigReader {
    private mixed $data;

    public function __construct($filepath) {
        $ext = pathinfo($filepath, PATHINFO_EXTENSION);
        if ($ext == 'json') {
            $this->data = json_decode(file_get_contents($filepath), true);
        } elseif ($ext == 'yaml' || $ext == 'yml') {
            $this->data = yaml_parse(file_get_contents($filepath));
        } elseif ($ext == 'xml') {
            $xml = simplexml_load_file($filepath);
            $this->data = json_decode(json_encode($xml), true);
        } elseif ($ext == 'ini') {
            $this->data = parse_ini_file($filepath, true);
        } else {
            throw new Exception("Unsupported config format: $ext");
        }
    }

    public function get($key) {
        return $this->data[$key];
    }

    public function getAll() {
        return $this->data;
    }

    public function setKey($key, $value) {
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
        putenv("{$key} = {$value}");
    }
}

// Пример использования
// $config = new ConfigReader('config.json');
// $value = $config->get('key');
// $data = $config->getAll();