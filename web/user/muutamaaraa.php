<?php

// Varmistetaan, että käyttäjä on kirjautunut
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

if (!isset($_GET["id"]) || !isset($_GET["m"])) {
    die("muuta määrää: tarvittuja parametrejä ei annettu");
}

$maara = $_GET["m"];
$ID = $_GET["id"];

include("../TKyhteys.php");

// Poistetaan rivi, jos ruokailijoiden määrä on nolla
if ($maara == 0) {
    $poisto = $TKyhteys->prepare("DELETE FROM ostoskori WHERE ( kayttaja = ? AND RuokaID = ? ) LIMIT 1");
    $poisto->execute(array($_SESSION["kaytID"], $ID));

    header("Location: kori.php");
    exit();
}

$muutos = $TKyhteys->prepare("UPDATE ostoskori SET maara = ? WHERE ( kayttaja = ? AND RuokaID = ? ) LIMIT 1");
$muutos->execute(array($maara, $_SESSION["kaytID"], $ID));

header("Location: kori.php");
?>
