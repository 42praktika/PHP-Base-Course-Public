<?php

namespace app\core;

abstract class Model
{
    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }
            $this->$key = $value;
           }
    }
}