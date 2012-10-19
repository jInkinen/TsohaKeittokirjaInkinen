<?php
// Varmistetaan että käyttäjä on kirjautunut
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

// Tarkistetaan annetut tiedot
$teksti = $_POST["teksti"];
$ID = $_POST["ID"];

if (!isset($teksti) || !isset($ID)) {
    die("Kommentointi: Vaadittuja arvoja ei annettu.");
}

if ($teksti == "") {
    die("Kommentointi: Tyhjä viesti");
}

// Lisätään tietokantaan
include("../TKyhteys.php");
$lisaa = $TKyhteys->prepare("INSERT INTO kommentit (kayttaja, RuokaID, teksti) VALUES (?, ?, ?)");
$lisaa->execute(array($_SESSION["kaytID"], $ID, $teksti));

header("Location: resepti.php?id=" . $ID);
?>
