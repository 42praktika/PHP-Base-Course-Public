<?php

use app\migrations\{Migration_0, Migration_1, Migration_2};

function getMigrations(): array
{
    return [new Migration_0(), new Migration_1(), new Migration_2()];
}