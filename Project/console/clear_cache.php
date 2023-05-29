<?php

use app\core\Template;

const PROJECT_ROOT = __DIR__ . "/../";
spl_autoload_register(function ($className) {
    require str_replace("app\\", PROJECT_ROOT, $className) . ".php";

});

Template::ClearCache();
