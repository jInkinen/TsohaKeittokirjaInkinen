<?php
$aines = $_POST["aines[]"];
$maara = $_POST["maara[]"];
$ruokaID = $_GET["id"];

include("../TKyhteys.php");
$insert = $TKyhteys->prepare("INSERT INTO ruoanAinekset (nimi, maara, ruokaID) VALUES (?, ?, ?)");

for ($i = 1; $i <= count($aines); $i++) {
    $insert->execute(array($aines[$i], $maara[$i], $ruokaID));
}
 
?>
