<?php

session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

include("../TKyhteys.php");

function lisaaKoriin($TK, $k, $r, $m) {
	$etsi = $TK->prepare("SELECT * FROM ostoskori WHERE RuokaID = ? AND kayttaja = ?");
	$etsi->execute(array($r, $k));

	if (!($onOlemassa = $etsi->fetch())) {
		$lisays = $TK->prepare("INSERT INTO ostoskori (kayttaja, RuokaID, maara) VALUES (?, ?, ?)");
		$lisays->execute(array($k, $r, $m));
	} else {
//		exit("Resepti " . $r . " on jo korissasi");
	}
}

if ($_POST["tyyppi"] == "r") {
    if (!isset($_POST["rID"])) {
        die("Koriin lisäys: Reseptin ID puuttuu.");
    }

    $rID = $_POST["rID"];
    $kayttaja = $_SESSION["kaytID"];

    lisaaKoriin($TKyhteys, $kayttaja, $rID, 1);

    header("Location: ../ruoka/resepti.php?id=" . $rID);
} else if ($_POST["tyyppi"] == "a") {
    if (!isset($_POST["ID"])) {
        die("Koriin lisäys: Aterian ID puuttuu.");
    }

    $aID = $_POST["ID"];
    $kayttaja = $_SESSION["kaytID"];

    $kysely = $TKyhteys->prepare("SELECT * FROM aterianruoat WHERE AteriaID = ?");
    $kysely->execute(array($aID));

    while ($ruoka = $kysely->fetch()) {
	    lisaaKoriin($TKyhteys, $kayttaja, $ruoka["RuokaID"], 1);
    }

    header("Location: ../ateria/ateria.php?id=" . $aID);
} else {
    die("lisaakoriin: virhe lisättävän tyypissä");
}
?>
