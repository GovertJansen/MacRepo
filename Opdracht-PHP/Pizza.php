<!DOCTYPE html>
<html lang="nl">

<!-- Pizza's uit array halen,      echo $pizza[0]["atrikel"]; -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    $MonPizzaPrijs = "7.50";
    $FriProcentKorting = "15";
    $FriPrijsVanaf = "20";
    $BezorgKosten = "5";


    $eindtotaal = "0";
    ?>

    <?php
    $pizzas = array(
        "Margherita" => array('name' => 'Margherita', 'prijs' => 12.50, 'aantal' => 0),
        "Funghi" => array('name' => 'Funghi', 'prijs' => 12.50, 'aantal' => 0),
        "Marina" => array('name' => 'Marina', 'prijs' => 13.95, 'aantal' => 0),
        "Hawaii" => array('name' => 'Hawaii',  'prijs' => 11.30, 'aantal' => 0),
        "Quattro-Formaggi" => array('name' => 'Quattro Formaggi', 'prijs' => 14.50, 'aantal' => 0)
    );
    ?>


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

            $cost = 0;
            foreach ($pizzas as $index => $pizza) {
                echo "<br>" .  $pizza['name'] . ": " . $_POST[$index] . "</br>";
                $cost += $pizza['prijs'] * $_POST[$index];
            }
            echo "<br> Total cost: " . $cost . "</br>";
        }


        ?>
    </div>

    <div class="main">

        <div class="titel">
            <h1>Pizza di mama</h1>
        </div>

        <form action="Pizza.php" method="POST">
            <div class="formulier">
                <div class="formulieronderelkaar">

                    <input type="text" placeholder="Naam" name="naam" class="tekstinput" required>
                    <input type="text" placeholder="Adres" name="adres" class="tekstinput" required>
                    <input type="text" placeholder="Postcode" name="postcode" class="tekstinput" required>
                    <input type="text" placeholder="Plaats" name="plaats" class="tekstinput" required>
                    <label for="date"> Besteldatum </label>
                    <input id="date" type="datetime-local" name="tijd" class="tekstinput" required>

                    <label>Bezorgen/Afhalen </label>
                    <select name="keuze">
                        <option name="afbe" disabled selected hidden value="">Maak uw keuze:</option>
                        <option name="afbe" value="Afhalen">Afhalen</option>
                        <option name="afbe" value="Bezorgen">Bezorgen</option>
                    </select>

                    <input class="bestellen" type="submit" value="Bestellen" name="submit">

                </div>
            </div>

            <!-- TABEL 1   -->
            <table class="tabel1">
                <tr>
                    <th>Soort</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                </tr>
                <?php

                foreach ($pizzas as $index => $pizza) {
                    echo "<tr>
                    <td class='tabel'>" . $pizza['name'] . "adfasfasf </td>
                    <td class='tabel'>€" . number_format($pizza['prijs'], 2, ',') . " </td>
                    <td class='tabel'><input type='number' name='" . $index . "' size='3' min='0' value='0'></td>
                    </tr>";
                }

                ?>
            </table>


            <!-- <table class="tabel1">
                <h5>Maandag alle pizza's €<?php echo $MonPizzaPrijs; ?> <h5>
                <h5>Vrijdag <?php echo $FriProcentKorting ?>% korting op je bestelling vanaf €<?php echo $FriPrijsVanaf; ?><h5>
                <h5>Bezorg kosten bedragen €<?php echo $BezorgKosten; ?><h5>
                <tr>
                    <td class="tabel">Pizza Margherita</td>
                    <td class="tabel">€<?php echo number_format("$PizzaMargherita", 2, ","); ?></td>
                    <td class="tabel"><input type="number" name="pizza[AantalMargherita]" size="3" min="0" value="0"></td>
                <tr>
                <tr>
                    <td class="tabel">Pizza Funghi</td>
                    <td class="tabel"> €<?php echo number_format("$PizzaFunghi", 2, ","); ?></td>
                    <td class="tabel"><input type="number" name="pizaAantalFunghi" size="3" min="0" value="0"></td>
                <tr>
                <tr>
                    <td class="tabel">Pizza Marina</td>
                    <td class="tabel">€<?php echo number_format("$PizzaMarina", 2, ","); ?></td>
                    <td class="tabel"><input type="number" name="AantalMarina" size="3" min="0" value="0"></td>
                <tr>
                    <td class="tabel">Pizza Hawai</td>
                    <td class="tabel">€<?php echo number_format("$PizzaHawai", 2, ","); ?></td>
                    <td class="tabel"><input type="number" name="AantalHawai" size="3" min="0" value="0"></td>

                <tr>
                    <td class="tabel">Pizza Quattro Formaggi</td>
                    <td class="tabel">€<?php echo number_format("$PizzaQuattroFormaggi", 2, ","); ?></td>
                    <td class="tabel"><input type="number" name="AantalFormaggi" size="3" min="0" value="0"></td>
                </tr>
            </table> -->

        </form>

        <?php if (isset($_POST["submit"])) {
            $AantalMargherita = $_POST["AantalMargherita"];
            $AantalFunghi = $_POST["AantalFunghi"];
            $AantalMarina = $_POST["AantalMarina"];
            $AantalHawai = $_POST["AantalHawai"];
            $AantalFormaggi = $_POST["AantalFormaggi"];

            if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                if (date('D', $datum) == "Mon") {
                    $PrijsMargherita = $AantalMargherita * $MonPizzaPrijs;
                    $PrijsFunghi = $AantalFunghi * $MonPizzaPrijs;
                    $PrijsMarina = $AantalMarina * $MonPizzaPrijs;
                    $PrijsHawai = $AantalHawai * $MonPizzaPrijs;
                    $PrijsFormaggi = $AantalFormaggi * $MonPizzaPrijs;
                    $eindtotaal = $PrijsMargherita + $PrijsFunghi + $PrijsMarina + $PrijsHawai + $PrijsFormaggi;
                } elseif (date("D", $datum) == "Fri") {
                    $PrijsMargherita = $AantalMargherita * $PizzaMargherita;
                    $PrijsFunghi = $AantalFunghi * $PizzaFunghi;
                    $PrijsMarina = $AantalMarina * $PizzaMarina;
                    $PrijsHawai = $AantalHawai * $PizzaHawai;
                    $PrijsFormaggi = $AantalFormaggi * $PizzaQuattroFormaggi;
                    $eindtotaal = $PrijsMargherita + $PrijsFunghi + $PrijsMarina + $PrijsHawai + $PrijsFormaggi;
                    if ($eindtotaal >= 20) {
                        $ProcentKorting =  (100 - $FriProcentKorting) / 100;
                        $eindtotaal = $eindtotaal * $ProcentKorting;
                    }
                } else {
                    $PrijsMargherita = $AantalMargherita * $PizzaMargherita;
                    $PrijsFunghi = $AantalFunghi * $PizzaFunghi;
                    $PrijsMarina = $AantalMarina * $PizzaMarina;
                    $PrijsHawai = $AantalHawai * $PizzaHawai;
                    $PrijsFormaggi = $AantalFormaggi * $PizzaQuattroFormaggi;
                    $eindtotaal = $PrijsMargherita + $PrijsFunghi + $PrijsMarina + $PrijsHawai + $PrijsFormaggi;
                }
            }

            // TABEL 2      
            if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                echo ' <table class="tabel2">
             <tr>
                 <th>Soort</th>
                 <th>Aantal</th>
                 <th>Prijs</th>
                 <th>Totaal</th>
             </tr> ';
            };

            if ($AantalMargherita > 0) {
                echo ' <tr> 
                 <td class="tabel">Pizza Margherita</td>
                 <td class="tabel"> ';
                echo $AantalMargherita;
                echo  ' </td>
                <td class="tabel"> ';
                if (date('D', $datum) == "Mon") {
                    echo '€' . number_format("$MonPizzaPrijs", 2, ",");
                } else {
                    echo '€' . number_format("$PizzaMargherita", 2, ",");
                };
                echo '
                </td>
                 <td class="tabel"> ';
                echo '€' . number_format("$PrijsMargherita", 2, ",");
                echo  ' </td>
                 </tr> ';
            };


            if ($AantalFunghi > 0) {
                echo  '<tr>
                 <td class="tabel">Pizza Funghi</td>
                 <td class="tabel"> ';
                echo $AantalFunghi;
                echo  ' </td>
                    <td class="tabel"> ';
                if (date('D', $datum) == "Mon") {
                    echo '€' . number_format("$MonPizzaPrijs", 2, ",");
                } else {
                    echo '€' . number_format("$PizzaFunghi", 2, ",");
                };
                echo ' 
                    </td>
                 <td class="tabel"> ';
                echo  '€' . number_format("$PrijsFunghi", 2, ",");
                echo ' </td>
                </tr> ';
            };

            if ($AantalMarina > 0) {
                echo ' <tr>
                 <td class="tabel">Pizza Marina</td>
                 <td class="tabel"> ';
                echo $AantalMarina;
                echo ' </td>
                    <td class="tabel"> ';
                if (date('D', $datum) == "Mon") {
                    echo '€' . number_format("$MonPizzaPrijs", 2, ",");
                } else {
                    echo '€' . number_format("$PizzaMarina", 2, ",");
                };
                echo ' 
                    </td>
                 <td class="tabel"> ';
                echo  '€' . number_format("$PrijsMarina", 2, ",");
                echo ' </td>
                </tr> ';
            };


            if ($AantalHawai > 0) {
                echo ' <tr>
                 <td class="tabel">Pizza Hawai</td>
                 <td class="tabel"> ';
                echo $AantalHawai;
                echo  ' </td>
                    <td class="tabel"> ';
                if (date('D', $datum) == "Mon") {
                    echo '€' . number_format("$MonPizzaPrijs", 2, ",");
                } else {
                    echo '€' . number_format("$PizzaHawai", 2, ",");
                };
                echo ' 
                    </td>
                 <td class="tabel"> ';
                echo  '€' . number_format("$PrijsHawai", 2, ",");
                echo ' </td>
                </tr> ';
            };


            if ($AantalFormaggi > 0) {
                echo ' <tr>
                 <td class="tabel">Pizza Quattro Formaggi</td>
                 <td class="tabel"> ';
                echo $AantalFormaggi;
                echo  ' </td>
                    <td class="tabel"> ';
                if (date('D', $datum) == "Mon") {
                    echo '€' . number_format("$MonPizzaPrijs", 2, ",");
                } else {
                    echo '€' . number_format("$PizzaQuattroFormaggi", 2, ",");
                };
                echo ' 
                    </td>
                 <td class="tabel"> ';
                echo  '€' . number_format("$PrijsFormaggi", 2, ",");
                echo ' </td>
                </tr> ';
            }



            if (date("D", $datum) == "Fri") {
                if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                    $EindTotaalVoorKorting = ($PrijsMargherita + $PrijsFunghi  + $PrijsMarina  + $PrijsHawai + $PrijsFormaggi);
                    echo ' <tr>
                    <td class="tabel">Totaal:</td>';
                    echo ' <td class="tabel"> ';
                    echo '€' . number_format("$EindTotaalVoorKorting", 2, ",");
                    echo ' </td>
                    </tr> ';
                }
            };

            if ($_POST["keuze"]) {
                $keuze = $_POST["keuze"];
                if ($keuze == "Bezorgen") {
                    if (date("D", $datum) == "Mon" || date("D", $datum) == "Tue" || date("D", $datum) == "Wed" || date("D", $datum) == "Thu" || date("D", $datum) == "Sat") {
                        if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                            $EindTotaalVoorKorting = ($PrijsMargherita + $PrijsFunghi  + $PrijsMarina  + $PrijsHawai + $PrijsFormaggi);
                            echo ' <tr>
                    <td class="tabel">Totaal:</td>';
                            echo ' <td class="tabel"> ';
                            echo '€' . number_format("$EindTotaalVoorKorting", 2, ",");
                            echo ' </td>
                    </tr> ';
                        }
                    }
                }
            };


            if (date("D", $datum) == "Fri") {
                $Korting = $EindTotaalVoorKorting - $eindtotaal;
                echo ' <tr>
             <td class="tabel">Korting:</td> ';
                echo  ' <td class="tabel"> ';
                echo '€' . number_format("$Korting ", 2, ",");
                echo ' </td> 
            </tr> ';
            };

            if ($_POST["keuze"]) {
                $keuze = $_POST["keuze"];
                if ($keuze == "Bezorgen") {
                    if (date("D", $datum) == "Fri") {
                        $EindTotaalNaKorting = $EindTotaalVoorKorting - $Korting;
                        echo ' <tr>
             <td class="tabel">Totaal:</td> ';
                        echo  ' <td class="tabel"> ';
                        echo '€' . number_format("$EindTotaalNaKorting ", 2, ",");
                        echo ' </td> 
            </tr> ';
                    }
                }
            };


            if ($_POST["keuze"]) {
                $keuze = $_POST["keuze"];
                if ($keuze == "Bezorgen") {
                    $eindtotaal = $eindtotaal + $BezorgKosten;
                } else {
                    $eindtotaal;
                }
            }

            if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                if ($keuze == "Bezorgen") {
                    echo ' <tr>
                      <td class="tabel">Bezorgkosten </td> ';
                    echo ' <td class="tabel"> ';
                    echo '€' . number_format("$BezorgKosten", 2, ",");
                    ' </td>
            </tr> ';
                };
            };

            if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                echo ' <tr>
             <td class="tabel">Te betalen: </td> ';
                echo '<td class="tabel"> ';
                echo  '€' . number_format("$eindtotaal", 2, ",");
                echo ' </td>
            </tr> ';
            };


            ' </table> ';
        }
        ?>
    </div>


</body>

</html>