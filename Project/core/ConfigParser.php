<?php

namespace app\core;
namespace app\controllers;
use Exception;

$json = file_get_contents('tsconfig.json');
$data = json_decode($json);

if ($data !== null) {
    $config_file = file_get_contents('tsconfig.json');
    $config_data = json_decode($config_file);
    setKey($this,$config_data);

}
else {
    throw new Exception("cannot config file");
}
public function setKey($key, $value) {
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
    putenv("{$key} = {$value}");
}