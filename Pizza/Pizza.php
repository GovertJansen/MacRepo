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
$MonPizzaPrijs = 7.50;
$FriProcentKorting = 15;
$FriPrijsVanaf = 20;
$BezorgKosten = 5;
$eindtotaal = 0;
$ProcentKorting =  (100 - $FriProcentKorting) / 100;
$KortingDag = "Fri";

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
    <!-- Invoer    -->
    <div class="main">

        <div class="titel">
            <h1>Pizza di mama</h1>
            <h5>Maandag alle pizza's €<?php echo $MonPizzaPrijs; ?> <h5>
                    <h5>Vrijdag <?php echo $FriProcentKorting ?>% korting op je bestelling vanaf €<?php echo $FriPrijsVanaf; ?><h5>
                            <h5> Bezorgkosten zijn €<?php echo $BezorgKosten ?>
        </div>

        <form action="PizzaBon.php" method="POST">
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



</body>

</html>