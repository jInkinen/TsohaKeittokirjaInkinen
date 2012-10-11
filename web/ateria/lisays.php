<?php

session_start();

if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

if (!isset($nimi) || $nimi == "") {
    die("Aterian nimi puuttuu.");
}

$nimi = $_POST["nimi"];
$kuvaus = $_POST["kuvaus"];

include("../TKyhteys.php");

//Lisätään uusi ateria
$insert = $TKyhteys->prepare("INSERT INTO ateria (nimi, kuvaus) VALUES (?, ?)");
$insert->execute(array($nimi, $kuvaus));

//Selvitetään lisätyn aterian ID tietokannasta ja ohjataan
//käyttäjä luodun aterian sivulle.
$select = $TKyhteys->prepare("SELECT ID FROM ateria WHERE nimi='" . $nimi . "'");
$select->execute();
$ID = $select->fetch();

header("Location: ateria.php?id=" . $ID["ID"]);
?>

