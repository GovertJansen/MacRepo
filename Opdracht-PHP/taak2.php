<?php
$land = '';
$naam = '';
if (isset($_POST["submit"])) {
    $land = $_POST["land"];
    $naam = $_POST["naam"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    , initial-scale=1.0">
    <title>PHP opdracht - vertaler</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" name="naam" placeholder="Uw naam" value="<?php echo $naam; ?>" required /> <br />

        <select name="land">

            <option disabled selected hidden value="">Maak uw keuze:</option>

            <option <?php if ($land == "NL") {
                        echo "selected";
                    } ?> value="NL">Nederland</option>

            <option <?php if ($land == 'DE') {
                        echo "selected";
                    } ?> value="DE">Duitsland</option>

            <option <?php if ($land == 'EN') {
                        echo "selected";
                    } ?> value="EN">Engeland</option>

            <option <?php if ($land == 'FR') {
                        echo "selected";
                    } ?> value="FR">Frankrijk</option>

            <option <?php if ($land == 'SP') {
                        echo "selected";
                    } ?> value="SP">Spaans</option>

            <option <?php if ($land == 'IT') {
                        echo "selected";
                    } ?> value="IT">Italiaans</option>
        </select>
        <br />
        <input type="submit" name="submit" value="gegevens versturen" />
    </form>



    <?php

    switch ($land) {
        case "NL":
            echo "Goedemorgen $naam";
            break;

        case "DE":
            echo "Guten Morgen $naam";
            break;

        case "EN":
            echo "Good morning $naam";
            break;

        case "FR":
            echo "Bonjour $naam";
            break;

        case "SP":
            echo "Buen Dia $naam";
            break;

        case "IT":
            echo "Buongiorno $naam";
            break;
    }
    ?>


</body>

</html>