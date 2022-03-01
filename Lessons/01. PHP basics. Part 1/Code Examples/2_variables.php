<?php

$variable = 5;
echo 'Before require script: ', $variable, "<br>";
require_once 'require_script.php';

echo 'After require script: ', $variable;
