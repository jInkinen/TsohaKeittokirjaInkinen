<?php
session_start();

if ($_SESSION["kirjautunut"] != 1) {
	header("Location: ../error.php");
	exit();
}

if (!isset($_POST["aID"]) ||!isset($_POST["ruoka"])) {
	die("lisaaRuokaDo: tarvittu arvoja ei annettu.");
}

$aID = $_POST["aID"];
$rID = $_POST["ruoka"];

if ($rID < 0) {
	die("Tyhjä arvo annettu.");
}

include("../TKyhteys.php");

$insert = $TKyhteys->prepare("INSERT INTO aterianruoat (AteriaID, RuokaID) VALUES (" . $aID . ", " . $rID .")");
$insert->execute();
header("Location: ateria.php?id=" . $aID);
?>
