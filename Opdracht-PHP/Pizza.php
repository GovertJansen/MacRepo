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
    <Div class="titel">
        <h1>Pizza di mama</h1>
    </Div>

    <div class="formulier">
        <div class="formulieronderelkaar">
            <form action="./Pizza.php" method="POST">
                <input type="text" placeholder="Naam" name="naam" class="tekstinput">
                <input type="text" placeholder="Adres" name="adres" class="tekstinput">
                <input type="text" placeholder="Postcode" name="postcode" class="tekstinput">
                <input type="text" placeholder="Plaats" name="plaats" class="tekstinput">
                <label for="date"> Besteldatum </label>
                <input id="date" type="datetime-local" name="be" class="tekstinput">
                <div class="bezorgdiv">
                    <label for=" bezorgoptie"> Bezorgoptie: </label>
                    <input id="afhalen" type="radio" name="bezorgoptie">
                    <label for="afhalen">Afhalen</label>
                    <input id="bezorgen" type="radio" name="bezorgoptie">
                    <label for="bezorgen">Bezorgen</label>
                </div>

                <input type="submit" value="Bestellen">
            </form>
        </div>
    </div>

    <div>
        <table class="tabel">
            <tr>
                <th>Soort</th>
                <th>Prijs per stuk</th>
                <th>Aantal</th>
            </tr>
            <tr>
                <td class="tableBorderL">Pizza Margherita</td>
                <td class="tableBorderM">12,50</td>
                <td class="tableBorderR"><input type="number" name="aantal"></td>
            <tr>
            <tr>
                <td class="tableBorderL">Pizza Funghi</td>
                <td class="tableBorderM"> 12,50</td>
                <td class="tableBorderR"><input type="number" name="aantal"></td>
            <tr>
            <tr>
                <td class="tableBorderL">Pizza Marina</td>
                <td class="tableBorderM">13,95</td>
                <td class="tableBorderR"><input type="number" name="aantal"></td>
            <tr>
                <td class="tableBorderL">Pizza Hawai</td>
                <td class="tableBorderM">11,50</td>
                <td class="tableBorderR"><input type="number" name="aantal"></td>

            <tr>
                <td class="tableBorderL">Pizza Quattro Formaggi</td>
                <td class="tableBorderM">14,50</td>
                <td class="tableBorderR"><input type="number" name="aantal"></td>
            </tr>


        </table>
    </div>














</body>

</html>