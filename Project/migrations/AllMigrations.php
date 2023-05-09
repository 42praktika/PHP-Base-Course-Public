<?php

use app\migrations\{Migration_0,
    Migration_1,
    Migration_2,
    Migration_3,
    Migration_4,
    Migration_5,
    Migration_6,
    Migration_7};

function getMigrations(): array
{
    return [new Migration_0(), new Migration_1(), new Migration_2(), new Migration_3(), new Migration_4(), new Migration_5(), new Migration_6(), new Migration_7()];
}