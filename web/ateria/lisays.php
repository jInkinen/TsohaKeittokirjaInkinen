<?php
session_start();

if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

$nimi = $_POST["nimi"];
$kuvaus = $_POST["kuvaus"];

if (!isset($nimi) || $nimi == "") {
    die("Aterian nimi puuttuu.");
}

include("../TKyhteys.php");

//Tarkistetaan onko samalla nimellä jo olemasa ateria
$kysely = $TKyhteys->prepare("SELECT nimi FROM ateria WHERE nimi = ?");
$kysely->execute(array($nimi));
$maara = $kysely->fetchAll();

if (count($maara) > 0) {
    die("Annetulla nimellä on jo olemassa ateria.");
}

//Lisätään uusi ateria
$insert = $TKyhteys->prepare("INSERT INTO ateria (nimi, kuvaus) VALUES (?, ?)");
$insert->execute(array($nimi, $kuvaus));

//Selvitetään lisätyn aterian ID tietokannasta ja ohjataan
//käyttäjä luodun aterian sivulle.
$select = $TKyhteys->prepare("SELECT ID FROM ateria WHERE nimi = ?");
$select->execute(array($nimi));
$ID = $select->fetch();

header("Location: ateria.php?id=" . $ID["ID"]);
?>

