<?php
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

include("../TKyhteys.php");

$tyhjennys = $TKyhteys->prepare("DELETE FROM ostoskori WHERE kayttaja = '" . $_SESSION["kaytID"] . "'");
$tyhjennys->execute();

header("Location: kori.php");
?>
