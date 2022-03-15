<?php

declare(strict_types=1);

var_dump(PHP_SAPI);
if (PHP_SAPI !== 'cli') {
    exit(1);
}

var_dump($argv);
