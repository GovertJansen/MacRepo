<?php

class Kassa
{
    public $invoer;
    public $winkelWagen = [];
    public $winkelWagenTotaal;
    public $betaalmethode;
    public $geldTerug;

    function __construct()
    {
        while (($this->invoer = readline("Geef bedrag:")) != 0) {
            array_push($this->winkelWagen, $this->invoer);
        };
        $this->winkelwagenTotaal();
        $this->betalen();
        $this->geldTerug();
    }

    function winkelwagenTotaal()
    {
        $this->winkelWagenTotaal = array_sum($this->winkelWagen);
        echo "U moet €" .  (number_format($this->winkelWagenTotaal, 2)) . " betalen.\n";
    }

    function betalen()
    {
        $this->betaalmethode = readline("Met welk bedrag betaald u?");
        while ($this->winkelWagenTotaal > 0) {
            if (!is_numeric($this->betaalmethode)) {
                echo ("Dit is geen geldig getal\n");
                $this->betaalmethode = readline("U moet nog €" . (number_format($this->winkelWagenTotaal, 2)) . " betalen.\n Met welk bedrag betaald U? ");
            } else {
                $this->winkelWagenTotaal = $this->winkelWagenTotaal - $this->betaalmethode;
                if ($this->winkelWagenTotaal > 0) $this->betaalmethode = readline("U moet nog €" . (number_format($this->winkelWagenTotaal, 2)) . " betalen.\n Met welk bedrag betaald U? ");
            }
        }
    }


    function geldTerug()
    {
        if ($this->geldTerug = abs($this->winkelWagenTotaal)) {
            echo "U heeft betaald.\nU krijgt €" . (number_format($this->geldTerug, 2)) . " terug.\n";
        } else {
            echo "U heeft betaald.";
        }
    }
}

$kassa1 = new kassa;
