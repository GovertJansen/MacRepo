<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
$ingelegd = 0;
$rente = 0;
$eindbedrag = 0;

if (isset($_POST["Ingelegd"]) && is_numeric($_POST["Ingelegd"])) {
    $ingelegd += $_POST["Ingelegd"];
}

if (isset($_POST["Rente"]) && is_numeric($_POST["Rente"])) {
    $rente += $_POST["Rente"];
}

if (isset($_POST["Eindbedrag"])) {
    $eindbedrag == $_POST["Eindbedrag"];
}
?>

<body>
    <div class="form">
        <form action="Rente.php" method="POST">
            <label for="Ingelegd">Ingelegd bedrag:</label>
            <input id="Ingelegd" type="number" name="Ingelegd" min="0" required></input>
            <label for="Rente">Rentepercentage</label>
            <input id="Rente" type="number" name="Rente" required min="0"></input>
            <input type="radio" name="Eindbedrag" value="10 jaar" required>Eindbedrag na 10 jaar </input>
            <input type="radio" name="Eindbedrag" value="verdubbeld" required>Eindbedrag verdubbeld</input>
            <input type="submit" value="Verzenden"></input>
        </form>
    </div>

    <?php

    if (isset($_POST["Eindbedrag"]) && $_POST["Eindbedrag"] == "10 jaar") {
        $eind = $ingelegd;
        for ($i = 0; $i <= 10; $i++) {
            $eind = $eind * (1 + ($rente / 100));
            echo number_format($eind, 2) . "<br>";
        }
    }
    if (isset($_POST["Eindbedrag"]) && $_POST["Eindbedrag"] == "verdubbeld") {
        for ($eind = $ingelegd; $eind <= $ingelegd * 2; $eind = $eind * (1 + ($rente / 100))) {
            echo  number_format($eind, 2) . "<br>";
        }
    }
    ?>
</body>

</html>