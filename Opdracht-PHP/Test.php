<?php
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
foreach ($pizzas as $pizza) {
    echo $pizza["naam"];
    echo ",   Prijs:" . $pizza["prijs"];
    echo "<br>";
}

$Q = 20;
function Rekenen($a)
{
    return   $a * 0.21;
}
$Som = Rekenen(2);
echo $Som;
echo "btw bedrag van $Q euro is " . Rekenen($Q) . "";
