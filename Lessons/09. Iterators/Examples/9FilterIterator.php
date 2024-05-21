<?php

declare(strict_types=1);

class DirectoryFilterIterator extends FilterIterator
{
    public function __construct(string $dir)
    {
        parent::__construct(new DirectoryIterator($dir));
    }

    public function accept(): bool
    {
        /**
         * @var DirectoryIterator $current
         */
        $current = $this->current();
        if ($current->isDir()) return false;
        return true;
    }
}

foreach (new DirectoryFilterIterator('.') as $file) {
    echo $file, PHP_EOL;
}