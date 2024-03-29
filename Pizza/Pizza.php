<?php
session_start();
include 'pizzaMain.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<!--  Bestelformulier    -->

<body>
    <div class="titel">
        <h1>Pizza di mama</h1>
        <h4>Maandag alle pizza's €<?php echo $MonPizzaPrijs; ?> <h4>
                <h4>Vrijdag <?php echo $FriProcentKorting ?>% korting op je bestelling vanaf €<?php echo $FriPrijsVanaf; ?><h4>
                        <h4> Bezorgkosten zijn €<?php echo $BezorgKosten ?> <h4>
    </div>
    <div class="container2">
        <form action="PizzaBon.php" method="POST">
            <div class="formulier">
                <div class="formulieronderelkaar">

                    <input type="text" placeholder="Naam" name="naam" class="tekstinput">
                    <input type="text" placeholder="Adres" name="adres" class="tekstinput">
                    <input type="text" placeholder="Postcode" name="postcode" class="tekstinput">
                    <input type="text" placeholder="Plaats" name="plaats" class="tekstinput">
                    <label for="date"> Besteldatum </label>
                    <input id="date" type="datetime-local" name="tijd" class="tekstinput" required>

                    <label>Bezorgen/Afhalen </label>
                    <select name="keuze" required>
                        <option name="afbe" disabled selected hidden value="">Maak uw keuze:</option>
                        <option name="afbe" value="Afhalen">Afhalen</option>
                        <option name="afbe" value="Bezorgen">Bezorgen</option>
                    </select>

                    <input class="bestellen" type="submit" value="Bestellen" name="submit">

                </div>
            </div>

            <table class="tabel1">
                <tr>
                    <th>Soort</th>
                    <th>Prijs </th>
                    <th>Aantal</th>
                </tr>
                <?php
                $pizzas = KrijgPizzasVanDb();
                foreach ($pizzas as $pizza) {
                    echo "<tr>
                    <td>" . $pizza['naam'] . "  </td>
                    <td class='alignR'>€" . number_format($pizza['prijs'], 2, ',') . " </td>
                    <td><input type='number' name='pizza[" . $pizza['naam'] . "]' size='3' min='0' value='0'></td>
                    </tr>";
                }
                ?>
            </table>
        </form>
    </div>
</body>

</html>

<!-- Einde Bestelformulier  -->