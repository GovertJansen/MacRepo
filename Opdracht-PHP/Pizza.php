<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    $MonPizzaPrijs = 7.50;
    $FriProcentKorting = 15;
    $FriPrijsVanaf = 20;
    $BezorgKosten = 5;
    $eindtotaal = 0;
    $ProcentKorting =  (100 - $FriProcentKorting) / 100;

    $pizzas = array(
        "Margherita" => array('name' => 'Margherita', 'prijs' => 12.50, 'aantal' => 0),
        "Funghi" => array('name' => 'Funghi', 'prijs' => 12.50, 'aantal' => 0),
        "Marina" => array('name' => 'Marina', 'prijs' => 13.95, 'aantal' => 0),
        "Hawaii" => array('name' => 'Hawaii',  'prijs' => 11.30, 'aantal' => 0),
        "Quattro-Formaggi" => array('name' => 'Quattro Formaggi', 'prijs' => 14.50, 'aantal' => 0)
    );
    ?>

    <!-- Invoer    -->
    <div class="main">

        <div class="titel">
            <h1>Pizza di mama</h1>
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
                foreach ($pizzas as $key => $pizza) {
                    echo "<tr>
                    <td>" . $pizza['name'] . "  </td>
                    <td>€" . number_format($pizza['prijs'], 2, ',') . " </td>
                    <td><input type='number' name='" . $key . "' size='3' min='0' value='0'></td>
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
                    <th>Korting</th>
                    <th>Totaal prijs</th>
                    </tr>";

                $Kosten = 0;
                foreach ($pizzas as $key => $pizza) {
                    if ($_POST[$key] <= 0) continue;
                    $Korting = "";
                    if (date('D', $datum) == "Mon") {
                        $Kosten += $MonPizzaPrijs * $_POST[$key];
                        $KostenPerPizza = $MonPizzaPrijs * $_POST[$key];
                        $pizza['prijs'] = $MonPizzaPrijs;
                    } elseif (date('D', $datum) == "Fri") {
                        $Kosten += $pizza['prijs'] * $_POST[$key];
                        $KostenPerPizza = $pizza['prijs'] * $_POST[$key];
                    } else {
                        $Kosten += $pizza['prijs'] * $_POST[$key];
                        $KostenPerPizza = $pizza['prijs'] * $_POST[$key];
                    };


                    echo "<tr>" .
                        "<td>" . $pizza['name']          . "</td>" .
                        "<td>" . $_POST[$key]            . "</td>" .
                        "<td>" . "€" . $pizza['prijs']   . "</td>" .
                        "<td>" . "€" . "$Korting"        . "</td>" .
                        "<td>" . "€" . "$KostenPerPizza" . "</td>";
                    echo "</tr>";
                }
                echo "<td> Totaal prijs: €" . number_format($Kosten, 2, ',') . "</td></table>";
                if ($Kosten >= 20) {
                    $Kosten = $Kosten * $ProcentKorting;
                    $KostenPerPizza = $_POST[$key] * $pizza['prijs'] * $ProcentKorting;
                    $Korting = $Kosten * $ProcentKorting;
                    echo $Korting;
                }
            }
            ?>
        </div>
        <!--Einde Bon -->
</body>

</html>