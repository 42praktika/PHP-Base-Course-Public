<?php

use app\migrations\{Migration_0};

function getMigrations(): array
{
    return [new Migration_0()];
}