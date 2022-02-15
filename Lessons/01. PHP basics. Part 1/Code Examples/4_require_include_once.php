<?php

$variable = 5;
echo 'Before require script: ', $variable, "<br>";

require_once ('require_script.php');
echo 'After require_once script: ', $variable, "<br>";

include_once ('require_script.php');
echo 'After include_once script: ', $variable, "<br>";

require_once ('require_script.php');
echo 'After require_once script: ', $variable, "<br>";
