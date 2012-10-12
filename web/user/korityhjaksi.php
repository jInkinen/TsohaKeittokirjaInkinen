<?php
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

include("../TKyhteys.php");

$tyhjennys = $TKyhteys->prepare("DELETE FROM ostoskori WHERE kayttaja = ?");
$tyhjennys->execute(array($_SESSION["kaytID"]));

header("Location: kori.php");
?>
