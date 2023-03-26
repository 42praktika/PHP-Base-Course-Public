<?php
declare(strict_types=1);

use Classes\ComplexNumber;

spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});



$cn = new ComplexNumber(1,1);

$cn->add(new ComplexNumber(1,-2));
$another = clone $cn;
echo unserialize(serialize($cn));
