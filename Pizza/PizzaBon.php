<?php
include 'pizzaMain.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <link rel="stylesheet" href="./style.css">
</head>

<?php
$eindtotaal = 0;
$KortingDag = "Fri";
?>

<!-- BON -->

<body>
    <div class="titel2">
        <h1>Bon</h1>
    </div>
    <div class="container">
        <div class="post">
            <?php
            if (isset($_POST["submit"])) {
                $pizzasPost = $_POST['pizza'];
                $naam = $_POST["naam"];
                $adres = $_POST["adres"];
                $postcode = $_POST["postcode"];
                $plaats = $_POST["plaats"];
                $datum = strtotime($_POST["tijd"]);
                $datum1 = date('l', $datum);

                function nlDate($datum1)
                {
                    $datum1 = str_replace("Monday",         "Maandag",         $datum1);
                    $datum1 = str_replace("Tuesday",     "Dinsdag",         $datum1);
                    $datum1 = str_replace("Wednesday",     "Woensdag",     $datum1);
                    $datum1 = str_replace("Thursday",     "Donderdag",     $datum1);
                    $datum1 = str_replace("Friday",         "Vrijdag",         $datum1);
                    $datum1 = str_replace("Saturday",     "Zaterdag",     $datum1);
                    $datum1 = str_replace("Sunday",         "Zondag",         $datum1);
                    echo $datum1;
                }

                echo "Bedankt voor de bestelling! <br>";
                echo "Naam: " . $naam .
                    "<br>";
                echo "Adres: " . $adres .
                    "<br>";
                echo "Postcode: " . $postcode .
                    "<br>";
                echo "Plaats: " . $plaats .
                    "<br>";
                echo "Besteldatum: ";
                echo  nlDate($datum1) . " " . date('d/m/Y', $datum) . ", " . date('H:i', $datum) .
                    "<br>";

                if (isset($_POST["keuze"])) {
                    $keuze = $_POST["keuze"];
                    echo $keuze . "<br>";
                } else {
                    $keuze = null;
                }
                echo "<table class='tabel2'> <tr>
                    <th>Pizza</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                    <th>Totaal prijs</th>
                    </tr>";

                $Kosten = 0;
                $TotaalInclKorting = 0;
                $Korting = 0;
                $TotaalInclBezorgen = 0;

                $pizzas = KrijgPizzasVanDb();

                foreach ($pizzas as $pizza) {
                    $pizzaAantal = $pizzasPost[$pizza["naam"]];
                    if ($pizzasPost[$pizza["naam"]] <= 0) continue;
                    if (date('D', $datum) == "Mon") {
                        $pizza['prijs'] = $MonPizzaPrijs;
                        $Kosten += $MonPizzaPrijs * $pizzaAantal;
                    } else {
                        $Kosten += $pizza['prijs'] * $pizzaAantal;
                    };

                    $prijs = $pizza['prijs'];
                    $TotaalPerPizza = $pizzaAantal * $prijs;

                    echo "<tr>" .
                        "<td class='alignC'>" .       $pizza['naam']                          . "</td>" .
                        "<td class='alignC'>" .             $pizzaAantal                     . "</td>" .
                        "<td class='alignR'>" . "€" . number_format($pizza['prijs'], 2, ',')  . "</td>" .
                        "<td class='alignR'>" . "€" . number_format($TotaalPerPizza, 2, ',') . "</td>";
                    echo "</tr>";
                }

                if (date('D', $datum) == $KortingDag && $Kosten >= 20) {
                    $TotaalInclKorting = $Kosten * $ProcentKorting;
                    $Korting = $Kosten - $TotaalInclKorting;
                }

                echo "<tr>  <td> <hr class='tr'>  Totaal prijs: </td> <td></td> <td></td><td class='pp'><hr> €" . number_format($Kosten, 2, ',');

                if ($keuze == "Afhalen" && $Korting == 0) {
                    echo "<hr> <hr>";
                }
                echo "</td> </tr> ";


                if ($Korting > 0) {
                    echo "<tr> <td> Korting: </td> <td></td><td>  </td> <td class='pp'>-€" . number_format($Korting, 2, ',') . "</td> </tr> ";
                    echo "<tr> <td> <hr class='tr'>Totaal prijs: </td> <td></td><td> </td> <td class='pp'><hr>€" . number_format($TotaalInclKorting, 2, ',');

                    if ($keuze == "Afhalen") {
                        echo "<hr> <hr>";
                    }
                    "</td></tr>";
                }

                if (date('D', $datum) == $KortingDag) {
                    if ($TotaalInclKorting == 0) {
                        $TotaalInclBezorgen += $Kosten + $BezorgKosten;
                    }
                    if ($TotaalInclKorting > 0) {
                        $TotaalInclBezorgen += $TotaalInclKorting + $BezorgKosten;
                    }
                } else {
                    $TotaalInclBezorgen = $Kosten += $BezorgKosten;
                }

                if ($keuze == "Bezorgen" && $Kosten > 0) {
                    echo "<tr> <td> Bezorgkosten:</td><td></td><td>  </td><td class='pp'>+€" . number_format($BezorgKosten, 2, ',') . " </td> </tr> ";
                    echo "<tr> <td>Totaal prijs: </td><td></td><td> </td> <td class='pp'><hr> €" . number_format($TotaalInclBezorgen, 2, ',') . " <hr> <hr> </td> </tr> ";
                }
            }
            ?>
            </table>
            <div class="return">
                <a href=Pizza.php>
                    <input type="submit" value="Opnieuw bestellen" />
                </a>
            </div>
        </div>
    </div>
</body>

</html>

<!-- Einde Bon  -->