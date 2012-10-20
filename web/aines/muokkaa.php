<?php

session_start();

$ID = $_POST["ID"];
$hinta = $_POST["hinta"];
$ravinto = $_POST["ravinto"];

if (!isset($ID) || !isset($hinta) || !isset($ravinto)) {
    die("Sivun vaatimia arvoja ei ole asetettu. Tulithan sivulle käyttäen aineksen muokkaus lomaketta?");
}

if ($_SESSION["kirjautunut"] != 1) {
    header("Location: aines.php?id=" . $ID);
    exit();
}

//Päivitetään tietokantaan uudet tiedot annettujen tietojen mukaan
include("../TKyhteys.php");
$muutos = $TKyhteys->prepare("UPDATE aines SET hinta = ?, ravinto = ? WHERE ID = ?");
$muutos->execute(array($hinta, $ravinto, $ID));
//echo "<br>" . $muutos->rowCount();
header("Location: aines.php?id=" . $ID);
?>
