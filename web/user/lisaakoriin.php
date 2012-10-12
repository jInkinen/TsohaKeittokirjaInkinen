<?php
if ($_SESSION["kirajutunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

if (!isset($_POST["rID"])) {
    die("Koriin lisäys: Reseptin ID puuttuu.");
}

$rID = $_POST["rID"];
$kayttaja = $_SESSION["kaytID"];

include("../TKyhteys.php");
$lisays = $TKyhteys->prepare("INSERT INTO ostoskori (kayttaja, RuokaID, maara) VALUES (?, ?, ?)");
$lisays->execute(array($kayttaja, $rID, 1));

header("Location: ../ruoka/resepti.php?id=" . $rID);
?>
