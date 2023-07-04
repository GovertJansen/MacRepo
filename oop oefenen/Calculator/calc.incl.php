<?php

declare(strict_types=1);
include 'class.autoload.incl.php';

$oper = $_POST["oper"];
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];


$calc = new Calc($oper, (int)$num1, (int)$num2);

try {
    echo $calc->calculator();
} catch (TypeError $e) {
    echo "error" . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Terug</a>
</body>

</html>