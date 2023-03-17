<!DOCTYPE html>
<html lang="nl">


<?php
$MonPizzaPrijs = "7.50";
$FriProcentKorting = "15";
$FriPrijsVanaf = "20";
$BezorgKosten = "5";
$PizzaMargherita = "12.50";
$PizzaFunghi = "12.50";
$PizzaMarina = "13.95";
$PizzaHawai = "11.30";
$PizzaQuattroFormaggi = "14.50";
$PrijsMargherita = "";
$PrijsFunghi = "";
$PrijsMarina = "";
$PrijsHawai = "";
$PrijsFormaggi = "";
$eindtotaal = "0";

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<!-- <?php
        $pizza = array(
            array('artikel' => 'Pizza Margherita', 'prijs' => 12.50, 'aantal' => 0),
            array('artikel' => 'Pizza Funghi', 'prijs' => 12.50, 'aantal' => 0),
            array('artikel' => 'Pizza Marina', 'prijs' => 13.95, 'aantal' => 0),
            array('artikel' => 'Pizza Hawaii',  'prijs' => 11.30, 'aantal' => 0),
            array('artikel' => 'Pizza Quattro Formaggi', 'prijs' => 14.50, 'aantal' => 0)
        );
        ?> -->

<body>
    <div class="post">
        <?php

        if (isset($_POST["submit"])) {
            $naam = $_POST["naam"];
            $adres = $_POST["adres"];
            $postcode = $_POST["postcode"];
            $plaats = $_POST["plaats"];
            $datum = strtotime($_POST["tijd"]);

            echo "Bedankt voor de bestelling! <br>";
            echo "Naam: " . $naam .
                "<br>";
            echo "Adres: " . $adres .
                "<br>";
            echo "Postcode: " . $postcode .
                "<br>";
            echo "Plaats: " . $plaats .
                "<br>";
            echo "Besteldatum: " . date('l d/M/Y', $datum) . ", " . date('H:i', $datum) .
                "<br>";
        }

        if (isset($_POST["keuze"])) {
            $keuze = $_POST["keuze"];
            echo $keuze . "<br>";
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


            <table class="tabel1">
                <h5>Maandag alle pizza's €<?php echo $MonPizzaPrijs; ?> <h5>
                        <h5>Vrijdag <?php echo $FriProcentKorting ?>% korting op je bestelling vanaf €<?php echo $FriPrijsVanaf; ?><h5>
                                <h5>Bezorg kosten bedragen €<?php echo $BezorgKosten; ?><h5>
                                        <tr>
                                            <td class="tabel">Pizza Margherita</td>
                                            <td class="tabel">€<?php echo number_format("$PizzaMargherita", 2, ","); ?></td>
                                            <td class="tabel"><input type="number" name="AantalMargherita" size="3" min="0" value="0"></td>
                                        <tr>
                                        <tr>
                                            <td class="tabel">Pizza Funghi</td>
                                            <td class="tabel"> €<?php echo number_format("$PizzaFunghi", 2, ","); ?></td>
                                            <td class="tabel"><input type="number" name="AantalFunghi" size="3" min="0" value="0"></td>
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
            </table>

            <!-- <table class="tabel1">
                <tr>
                    <th>Soort</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                </tr>
                 <?php
                    for ($i = 0; $i < count($pizza); $i++) {
                        echo "<tr>
                    <td class='tabel'> " . $pizza[$i]['artikel'] . " </td>
                    <td class='tabel'> " . $pizza[$i]['prijs'] . " </td>
                    <td class='tabel'> <input type='number' name='aantal1'" . $pizza[$i]['artikel'] . "' size='3' min='0' value='0'></td>
                    </tr>";
                    }
                    ?>
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

            if ($AantalMargherita > 0 || $AantalFunghi > 0 || $AantalMarina > 0 || $AantalHawai > 0 || $AantalFormaggi > 0) {
                $EindtotaalVoorKorting = ($PrijsMargherita * $AantalMargherita) + ($PrijsFunghi * $AantalFunghi) + ($PrijsMarina * $AantalMarina) + ($PizzaHawai * $AantalHawai) + ($PizzaQuattroFormaggi * $AantalFormaggi);
                echo ' <tr>
             <td class="tabel">Totaal:</td>';
                echo ' <td class="tabel"> ';
                echo '€' . number_format("$EindtotaalVoorKorting", 2, ",");
                echo ' </td>
            </tr> ';
            };


            if (date("D", $datum) == "Fri") {
                $Korting = $EindtotaalVoorKorting - $eindtotaal;
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