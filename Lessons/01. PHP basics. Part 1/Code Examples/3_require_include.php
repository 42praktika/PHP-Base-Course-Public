<?php

$variable = 5;
echo 'Before require script: ', $variable, "<br>";

require 'require_script.php';
echo 'After require script: ', $variable, "<br>";

include 'require_script.php';
echo 'After include script: ', $variable, "<br>";

require 'require_script.php';
echo 'After require script: ', $variable, "<br>";
