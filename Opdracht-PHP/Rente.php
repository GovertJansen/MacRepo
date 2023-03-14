<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="form">
        <form action="Rente.php" method="POST">
            <label for="Ingelegd">Ingelegd bedrag:</label>
            <input id="Ingelegd" type="text" name="Ingelegd"></input>
            <label for="Rente">Rentepercentage</label>
            <input id="Rente" type="text" name="Rente"></input>
            <input type="radio" name="Eindbedrag" value="Eindbedrag na 10 jaar">Eindbedrag na 10 jaar</input>
            <input type="radio" name="Eindbedrag" value="Eindbedrag verdubbeld">Eindbedrag verdubbeld</input>
            <input type="submit" value="Verzenden"></input>
        </form>
    </div>

    <?php
    $ingelegd = $_POST["Ingelegd"];
    $rente = $_POST["Rente"];
    $eindbedrag = $_POST["Eindbedrag"];
    ?>

</body>

</html>