<!DOCTYPE html>
<html lang="en">

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
            echo "Besteldatum: " . date('D d/M/Y', $datum) . ", " . date('H:i', $datum) .
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

                    <select name="keuze">
                        <option name="afbe" disabled selected hidden value="">Maak uw keuze:</option>
                        <option name="afbe" value="Afhalen">Afhalen</option>
                        <option name="afbe" value="Bezorgen">Bezorgen</option>
                    </select>

                    <input class="bestellen" type="submit" value="Bestellen" name="submit">

                </div>
            </div>


            <table class="tabel1">
                <h5>Maandag alle pizza's 7.50,-<h5>
                        <h5>Vrijdag 15% korting op je bestelling vanaf 20,-<h5>
                                <h5>Bezorg kosten bedragen 5,-<h5>
                                        <tr>
                                            <td class="tabel">Pizza Margherita</td>
                                            <td class="tabel">12,50</td>
                                            <td class="tabel"><input type="number" name="AantalMargherita" size="3" min="0" value="0"></td>
                                        <tr>
                                        <tr>
                                            <td class="tabel">Pizza Funghi</td>
                                            <td class="tabel"> 12,50</td>
                                            <td class="tabel"><input type="number" name="AantalFunghi" size="3" min="0" value="0"></td>
                                        <tr>
                                        <tr>
                                            <td class="tabel">Pizza Marina</td>
                                            <td class="tabel">13,95</td>
                                            <td class="tabel"><input type="number" name="AantalMarina" size="3" min="0" value="0"></td>
                                        <tr>
                                            <td class="tabel">Pizza Hawai</td>
                                            <td class="tabel">11,50</td>
                                            <td class="tabel"><input type="number" name="AantalHawai" size="3" min="0" value="0"></td>

                                        <tr>
                                            <td class="tabel">Pizza Quattro Formaggi</td>
                                            <td class="tabel">14,50</td>
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
                    $PrijsMargherita = $AantalMargherita * 7.50;
                    $PrijsFunghi = $AantalFunghi * 7.50;
                    $PrijsMarina = $AantalMarina * 7.50;
                    $PrijsHawai = $AantalHawai * 7.50;
                    $PrijsFormaggi = $AantalFormaggi * 7.50;
                    $eindtotaal = $PrijsMargherita + $PrijsFunghi + $PrijsMarina + $PrijsHawai + $PrijsFormaggi;
                } elseif (date("D", $datum) == "Fri") {
                    $PrijsMargherita = $AantalMargherita * 12.50;
                    $PrijsFunghi = $AantalFunghi * 12.50;
                    $PrijsMarina = $AantalMarina * 13.95;
                    $PrijsHawai = $AantalHawai * 11.50;
                    $PrijsFormaggi = $AantalFormaggi * 14.50;
                    $eindtotaal = $PrijsMargherita + $PrijsFunghi + $PrijsMarina + $PrijsHawai + $PrijsFormaggi;
                    if ($eindtotaal >= 20) {
                        $eindtotaal = $eindtotaal * 0.80;
                    }
                } else {
                    $PrijsMargherita = $AantalMargherita * 12.50;
                    $PrijsFunghi = $AantalFunghi * 12.50;
                    $PrijsMarina = $AantalMarina * 13.95;
                    $PrijsHawai = $AantalHawai * 11.50;
                    $PrijsFormaggi = $AantalFormaggi * 14.50;
                    $eindtotaal = $PrijsMargherita + $PrijsFunghi + $PrijsMarina + $PrijsHawai + $PrijsFormaggi;
                }
                if ($_POST["keuze"]) {
                    $keuze = $_POST["keuze"];
                    if ($keuze == "Bezorgen") {
                        $eindtotaal = $eindtotaal + 5;
                    } else {
                        $eindtotaal;
                    }
                }
            }

            echo ' <table class="tabel2">
         <tr>
             <th>Soort</th>
             <th>Aantal</th>
             <th>Prijs</th>
         </tr>
         <tr> 
             <td class="tabel">Pizza Margherita</td>
             <td class="tabel"> ';
            echo $AantalMargherita;
            echo  ' </td>
             <td class="tabel"> ';
            echo $PrijsMargherita;
            echo  ' </td>
         </tr>
         <tr>
             <td class="tabel">Pizza Funghi</td>
             <td class="tabel"> ';
            echo $AantalFunghi;
            echo  ' </td>
             <td class="tabel"> ';
            echo $PrijsFunghi;
            echo ' </td>
         </tr>
         <tr>
             <td class="tabel">Pizza Marina</td>
             <td class="tabel"> ';
            echo $AantalMarina;
            echo ' </td>
             <td class="tabel"> ';
            echo $PrijsMarina;
            echo ' </td>
         </tr>
         <tr>
             <td class="tabel">Pizza Hawai</td>
             <td class="tabel"> ';
            echo $AantalHawai;
            echo  ' </td>
             <td class="tabel"> ';
            echo $PrijsHawai;
            echo ' </td>
        </tr>
         <tr>
             <td class="tabel">Pizza Quattro Formaggi</td>
             <td class="tabel"> ';
            echo $AantalFormaggi;
            echo  ' </td>
             <td class="tabel"> ';
            echo $PrijsFormaggi;
            echo ' </td>
         </tr> 
            
         <tr>
             <td class="tabel">Totale prijs: ';
            echo $eindtotaal;
            echo ' </td>
        </tr>

     </table> ';
        }
        ?>
    </div>


</body>

</html>