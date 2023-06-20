<?php

class muntjeGooien
{
    public string $items;

    function kopOfMunt()
    {
        $items = array("Kop", "Munt");
        $items = [array_rand($items)];
    }
    function getKopOfMunt()
    {
        return $this->items;
    }
}

$uitslag1  = new muntjeGooien();
$uitslag1->kopOfMunt();
echo $uitslag1->getKopOfMunt();
