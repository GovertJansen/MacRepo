<?php

class Speelveld
{
    public $Lengte;
    public $Breedte;

    function OppervBer()
    {
        $this->Lengte = readline("Geef een lengte:");
        $this->Breedte = readline("Geef een breedte:");
        $oppervlakte = $this->Lengte * $this->Breedte;
        $omtrek = $this->Lengte + $this->Lengte + $this->Breedte + $this->Breedte;
        echo "De oppervlakte is: " . $oppervlakte . "\n";
        echo "De omtrek is: " . $omtrek;
    }
}

// $Berekenen1 = new Speeldveld;
// $Berekenen1->OppervBer();
// print_r($Berekenen1);
