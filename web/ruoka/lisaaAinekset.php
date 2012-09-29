<?php
$aines = $_POST["aines"];
$maara = $_POST["maara"];
$rnimi = $_POST["ruokaID"];

if (!isset($aines) || !isset($maara) || !isset($rnimi)) {
    die("Vaadittuja arvoja ei lähetetty sivulle. Tulitko sivulle oikeaa reittiä?");
}

include("../TKyhteys.php");


for ($i = 0; $i < count($aines); $i++) {
    //Lisätään uudet ainekset omaan tauluunsa
    $insert = $TKyhteys->prepare("INSERT INTO aines (nimi) VALUES ('" . $aines[$i] . "')");
    $insert->execute();
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
?>