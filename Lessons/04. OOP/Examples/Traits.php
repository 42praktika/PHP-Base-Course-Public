<?php

trait FuzzMakerTrait
{
    public function MakeFuzz() : string
    {
        return "Fuzz";
    }

    public function MakeBuzz() : string
    {
        return "Buzz";
    }
}

trait FuzzMakerRusTrait
{
    public function MakeFuzz() : string
    {
        return "Фуз";
    }
}

class LoveRus
{
    use FuzzMakerTrait, FuzzMakerRusTrait {
        FuzzMakerRusTrait::MakeFuzz insteadof FuzzMakerTrait;
    }

}


class LoveBoth
{

    use FuzzMakerTrait, FuzzMakerRusTrait {
        FuzzMakerTrait::MakeFuzz insteadof FuzzMakerRusTrait;
        FuzzMakerRusTrait::MakeFuzz as MakeFuzzRus;
    }


}


echo (new LoveRus())->MakeFuzz()."\r\n";
echo (new LoveBoth())->MakeFuzz()."\r\n";
echo (new LoveBoth())->MakeFuzzRus()."\r\n";

