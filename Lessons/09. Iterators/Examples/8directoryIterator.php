<?php

declare(strict_types=1);

$di = new DirectoryIterator('.');


/**
 * @var DirectoryIterator $file
 */
foreach ($di as $file) {
  echo $file->getFilename()," ", $file->isDir()?"DIR":"FILE"," ", $file->getSize(), PHP_EOL;
}