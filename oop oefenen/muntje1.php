<?php

class Muntje
{
    private string $kopOfMunt;

    // function __construct()
    // {
    //     if (rand(1, 0) == 0) {
    //         $this->kopOfMunt = "Munt";
    //     } else {
    //         $this->kopOfMunt = "Kop";
    //     }
    //     echo  $this->kopOfMunt;
    // }
    function KopMunt()
    {
        if (rand(1, 0) == 0) {
            $this->kopOfMunt = "Munt";
        } else {
            $this->kopOfMunt = "Kop";
        }
        echo  $this->kopOfMunt;
    }
}
$muntje1 = new Muntje();
$muntje1->KopMunt();
