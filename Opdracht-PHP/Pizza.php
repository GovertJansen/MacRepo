<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<?php
function GetPizzasFromDB()
{
    $dbhost = "localhost";
    $dbname = "pizzas";
    $user = "root";
    $pass = "root";
    try {
        $database = new PDO("mysql:host=$dbhost;dbname=$dbname", $user, $pass);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $query = "select * from pizzas";
    $pizzas = $database->prepare($query);
    $pizzas->execute(array());
    $pizzas->setFetchMode(PDO::FETCH_ASSOC);
    return $pizzas;
}
?>

<body>
    <?php
    $MonPizzaPrijs = 7.50;
    $FriProcentKorting = 15;
    $FriPrijsVanaf = 20;
    $BezorgKosten = 5;
    $eindtotaal = 0;
    $ProcentKorting =  (100 - $FriProcentKorting) / 100;
    $KortingDag = "Fri";


    ?>

    <!-- Invoer    -->
    <div class="main">

        <div class="titel">
            <h1>Pizza di mama</h1>
            <h5>Maandag alle pizza's €<?php echo $MonPizzaPrijs; ?> <h5>
                    <h5>Vrijdag <?php echo $FriProcentKorting ?>% korting op je bestelling vanaf €<?php echo $FriPrijsVanaf; ?><h5>
                            <h5> Bezorgkosten zijn €<?php echo $BezorgKosten ?>
        </div>

        <form action="Pizza.php" method="POST">
            <div class="formulier">
                <div class="formulieronderelkaar">

                    <input type="text" placeholder="Naam" name="naam" class="tekstinput">
                    <input type="text" placeholder="Adres" name="adres" class="tekstinput">
                    <input type="text" placeholder="Postcode" name="postcode" class="tekstinput">
                    <input type="text" placeholder="Plaats" name="plaats" class="tekstinput">
                    <label for="date"> Besteldatum </label>
                    <input id="date" type="datetime-local" name="tijd" class="tekstinput">

                    <label>Bezorgen/Afhalen </label>
                    <select name="keuze">
                        <option name="afbe" disabled selected hidden value="">Maak uw keuze:</option>
                        <option name="afbe" value="Afhalen">Afhalen</option>
                        <option name="afbe" value="Bezorgen">Bezorgen</option>
                    </select>

                    <input class="bestellen" type="submit" value="Bestellen" name="submit">

                </div>
            </div>

            <table class="tabel">
                <tr>
                    <th>Soort</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                </tr>
                <?php
                $pizzas = GetPizzasFromDB();
                foreach ($pizzas as $pizza) {
                    echo "<tr>
                    <td>" . $pizza['naam'] . "  </td>
                    <td>€" . number_format($pizza['prijs'], 2, ',') . " </td>
                    <td><input type='number' name='pizza[" . $pizza['naam'] . "]' size='3' min='0' value='0'></td>
                    </tr>";
                }
                ?>
            </table>
        </form>
        <!-- Einde Invoer -->


        <!-- Bon -->
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
                }

                echo "<table class='tabel'> <tr>
                    <th>Pizza</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                    <th>Totaal Prijs</th>
                    </tr>";

                $Kosten = 0;
                $TotaalInclKorting = 0;
                $Korting = 0;
                $TotaalInclBezorgen = 0;

                $pizzas = GetPizzasFromDB();

                foreach ($pizzas as $pizza) {
                    $pizzaAantal = $pizzasPost[$pizza["naam"]];
                    if ($pizzasPost[$pizza["naam"]] <= 0) continue;
                    if (date('D', $datum) == "Mon") {
                        $pizza['prijs'] = $MonPizzaPrijs;
                        $Kosten += $MonPizzaPrijs * $pizzaAantal;
                    } else {
                        $Kosten += $pizza['prijs'] * $pizzaAantal;
                    };

                    echo "<tr>" .
                        "<td>" .       $pizza['naam']                          . "</td>" .
                        "<td>" .             $pizzaAantal                     . "</td>" .
                        "<td>" . "€" . number_format($pizza['prijs'], 2, ',')  . "</td>" .
                        "<td>" . "€" . number_format($pizza['prijs'], 2, ',')  . "</td>";
                    echo "</tr>";
                }

                if (date('D', $datum) == $KortingDag && $Kosten >= 20) {
                    $Kosten = $Kosten;
                    $TotaalInclKorting = $Kosten * $ProcentKorting;
                    $Korting = $Kosten - $TotaalInclKorting;
                }

                echo "<tr> <td> Totaal prijs:</td> <td>-</td> <td>-</td><td>€" . number_format($Kosten, 2, ',') . "</td> </tr> ";

                if ($Korting > 0) {
                    echo "<tr> <td> Korting: </td> <td>-</td><td> - </td> <td>€" . number_format($Korting, 2, ',') . "</td> </tr> ";
                    echo "<tr> <td> Totaal prijs: </td> <td>-</td><td> - </td> <td>€" . number_format($TotaalInclKorting, 2, ',') . "</td></tr>";
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

                if (isset($_POST["keuze"])) {
                    $keuze = $_POST["keuze"];
                    if ($keuze == "Bezorgen" && $Kosten > 0) {
                        echo "<tr> <td> Bezorgkosten:</td><td>-</td><td> - </td><td>€" . number_format($BezorgKosten, 2, ',') . " </td> </tr> ";
                        echo "<tr> <td> Totaal prijs: </td><td>-</td><td> - </td> <td> €" . number_format($TotaalInclBezorgen, 2, ',') . " </td> </tr> ";
                    }
                }
            }
            ?>
        </div>
        <!-- Einde Bon -->
</body>

</html>