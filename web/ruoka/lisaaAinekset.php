<?php
session_start();

if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

$aines = $_POST["aines"];
$yksikko = $_POST["yksikko"];
$maara = $_POST["maara"];
$rnimi = $_POST["ruokaID"];

if (!isset($aines) || !isset($maara) || !isset($rnimi) || !isset($yksikko)) {
    die("Vaadittuja arvoja ei lähetetty sivulle. Tulitko sivulle oikeaa reittiä?");
}
if (count($aines) < 1) {
    die("Liian vähän aineksia.");
}

include("../TKyhteys.php");


for ($i = 0; $i < count($aines); $i++) {
    // Ei lisätä tyhjiä rivejä turhaan.
    if ($aines[$i] == "") {
        continue;
    }
    //Lisätään uudet ainekset omaan tauluunsa
    $insert = $TKyhteys->prepare("INSERT INTO aines (nimi, yksikko) VALUES (?, ?)");
    $insert->execute(array($aines[$i], $yksikko[$i]));
    //Valitaan lisätty aines tietokannan antaman ID-luvun mukaan
    $select = $TKyhteys->prepare("SELECT ID FROM aines WHERE nimi='" . $aines[$i] . "'");
    $select->execute();
    $aID = $select->fetch();
    //Valitaan lisäys.php:ssä lisätty ruoka sen nimen perusteella
    $select2 = $TKyhteys->prepare("SELECT ID FROM ruoka WHERE nimi='" . $rnimi . "'");
    $select2->execute();
    $rID = $select2->fetch();
    //Viedään näiden kahden yhdistelmä aputauluun "ruoanainekset", jolloin voidaan tarkastella mitä aineksia on missäkin ruoassa.
    $insert2 = $TKyhteys->prepare("INSERT INTO ruoanainekset (RuokaID, AinesID, maara) VALUES (" . $rID[0] . ", " . $aID[0] . ", " . $maara[$i] . ")");
    $insert2->execute();
}

header("Location: resepti.php?id=" . $rID[0]);
?>