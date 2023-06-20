<?php

class Kassa
{
    public $invoer;
    public $winkelWagen = [];
    public $winkelWagenTotaal;
    public $betaalmethode;
    public $geldTerug;

    function kassaVullen()
    {
        while (($this->invoer = readline("Geef bedrag:")) != 0) {
            array_push($this->winkelWagen, $this->invoer);
        };

        $this->winkelWagenTotaal = array_sum($this->winkelWagen);
        echo "U moet €" .  (number_format($this->winkelWagenTotaal, 2)) . " betalen.\n";
        $this->betaalmethode = readline("Met welk bedrag betaald u?");
        print_r($this->winkelWagen);
    }
}

$kassa1 = new kassa;
$kassa1->kassaVullen();
