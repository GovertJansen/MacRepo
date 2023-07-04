<?php

class tafels
{
    public  $uitkomsten = [];
    public int $tafel;


    function __construct(int $tafel)
    {
        $this->tafel = $tafel;

        for ($i = 1; $i <= 10; $i++) {
            array_push($this->uitkomsten, "$i x $this->tafel = "  . $i * $this->tafel . "\n");
        }
    }

    function Show()
    {
        echo "Tafel van $this->tafel \n";
        foreach ($this->uitkomsten as $uitkomst) {
            echo $uitkomst;
        }
        echo "\n";
    }
}

$tafels1 = new tafels(2);
$tafels1->Show();



$tafels1 = new tafels(6);
$tafels1->Show();



// class tafels
// {
//     public int $tafel;

//     function TafelBerekening()
//     {
//         $this->tafel = readline("Geef uw tafel:");
//         for ($i = 0; $i <= 10; $i++) {
//             $uitkomst = "$i x $this->tafel = "  . $i * $this->tafel . "\n";
//             echo $uitkomst;
//         }
//     }
// }
// $tafel1 = new tafels;
// $tafel1->TafelBerekening();
