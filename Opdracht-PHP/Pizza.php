<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<?php
$pizza = array(
    array('artikel' => 'Pizza Margherita', 'prijs' => 12.50, 'aantal' => 0),
    array('artikel' => 'Pizza Funghi', 'prijs' => 12.50, 'aantal' => 0),
    array('artikel' => 'Pizza Marina', 'prijs' => 13.95, 'aantal' => 0),
    array('artikel' => 'Pizza Hawaii',  'prijs' => 11.30, 'aantal' => 0),
    array('artikel' => 'Pizza Quattro Formaggi', 'prijs' => 14.50, 'aantal' => 0)
);
?>

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
                        <option disabled selected hidden value="">Maak uw keuze:</option>
                        <option value="Afhalen">Afhalen</option>
                        <option value="Bezorgen">Bezorgen</option>
                    </select>

                    <input class="bestellen" type="submit" value="Bestellen" name="submit">

                </div>
            </div>


            <table class="tabel1">
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
            </table>
        </form>


        <table class="tabel2">

            <tr>
                <th>Soort</th>
                <th>Aantal</th>
                <th>Prijs</th>
            </tr>
            <tr>
                <td class="tabel">Pizza Margherita</td>
                <td class="tabel"> <?php echo ''; ?> </td>
                <td class="tabel"> </td>
            <tr>
            <tr>
                <td class="tabel">Pizza Funghi</td>
                <td class="tabel"> <?php echo ''; ?> </td>
                <td class="tabel"> </td>
            <tr>
            <tr>
                <td class="tabel">Pizza Marina</td>
                <td class="tabel"> <?php echo '' ?> </td>
                <td class="tabel"> </td>
            <tr>
                <td class="tabel">Pizza Hawai</td>
                <td class="tabel"> <?php echo ''; ?></td>
                <td class="tabel"> </td>

            <tr>
                <td class="tabel">Pizza Quattro Formaggi</td>
                <td class="tabel"> <?php echo ''; ?> </td>
                <td class="tabel"> </td>
            </tr>


        </table>

    </div>





</body>

</html>