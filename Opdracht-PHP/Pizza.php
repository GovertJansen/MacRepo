<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="post">
        <?php
        if (isset($_POST["submit"])) {
            $naam = $_POST["naam"];
            $adres = $_POST["adres"];
            $postcode = $_POST["postcode"];
            $plaats = $_POST["plaats"];
            $tijd = $_POST["tijd"];
            // $bezorgen = $_POST["bezorgen"];

            echo "Bedankt voor de bestelling! <br>";
            echo "Naam: " . $naam .
                "<br>";
            echo "Adres: " . $adres .
                "<br>";
            echo "Postcode: " . $postcode .
                "<br>";
            echo "Plaats: " . $plaats .
                "<br>";
            echo "Tijd: " . $tijd .
                "<br>";
            // echo $bezorgen;
        }
        ?>
    </div>

    <div class="main">

        <div class="titel">
            <h1>Pizza di mama</h1>
        </div>

        <div class="formulier">
            <div class="formulieronderelkaar">
                <form action="Pizza.php" method="POST">
                    <input type="text" placeholder="Naam" name="naam" class="tekstinput" required>
                    <input type="text" placeholder="Adres" name="adres" class="tekstinput" required>
                    <input type="text" placeholder="Postcode" name="postcode" class="tekstinput" required>
                    <input type="text" placeholder="Plaats" name="plaats" class="tekstinput" required>
                    <label for="date"> Besteldatum </label>
                    <input id="date" type="datetime-local" name="tijd" class="tekstinput" required>

                    <div class="bezorgdiv">
                        <label for=" bezorgoptie"> Bezorgoptie: </label>
                        <input id="afhalen" type="radio" name="bezorgoptie" required>
                        <label for="afhalen">Afhalen</label>
                        <input id="bezorgen" type="radio" name="bezorgoptie" required>
                        <label for="bezorgen">Bezorgen</label>
                    </div>

                    <input class="bestellen" type="submit" value="Bestellen" name="submit">
                </form>
            </div>
        </div>


        <table class="tabel1">
            <tr>
                <th>Soort</th>
                <th>Prijs per stuk</th>
                <th>Aantal</th>
            </tr>
            <tr>
                <td class="tabel">Pizza Margherita</td>
                <td class="tabel">12,50</td>
                <td class="tabel"><input type="number" name="aantal" size="3" min="0" value="0"></td>
            <tr>
            <tr>
                <td class="tabel">Pizza Funghi</td>
                <td class="tabel"> 12,50</td>
                <td class="tabel"><input type="number" name="aantal" size="3" min="0" value="0"></td>
            <tr>
            <tr>
                <td class="tabel">Pizza Marina</td>
                <td class="tabel">13,95</td>
                <td class="tabel"><input type="number" name="aantal" size="3" min="0" value="0"></td>
            <tr>
                <td class="tabel">Pizza Hawai</td>
                <td class="tabel">11,50</td>
                <td class="tabel"><input type="number" name="aantal" size="3" min="0" value="0"></td>

            <tr>
                <td class="tabel">Pizza Quattro Formaggi</td>
                <td class="tabel">14,50</td>
                <td class="tabel"><input type="number" name="aantal" size="3" min="0" value="0"></td>
            </tr>


        </table>
    </div>





</body>

</html>