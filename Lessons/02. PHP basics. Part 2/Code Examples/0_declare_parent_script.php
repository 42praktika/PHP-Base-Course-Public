<?php

function tryToUseStrictTypes(int $myVariable)
{
    var_dump($myVariable);
}

//строка преобразуется к int-у
tryToUseStrictTypes('1');
