<?php
$aines = $_POST["aines[]"];
$maara = $_POST["maara[]"];
$ruokaID = $_GET["id"];

if (!isset($aines) || !isset($maara) || !isset($ruokaID)) {
    die("Vaadittuja arvoja ei lähetetty sivulle. Tulitko sivulle oikeaa reittiä?");
}

include("../TKyhteys.php");


for ($i = 1; $i <= count($aines); $i++) {
    $insert = $TKyhteys->prepare("INSERT INTO aines (nimi) VALUES (" . $aines . ")");
    $insert->execute();
    
    $select = $TKyhteys->prepare("SELECT ID FROM aines WHERE nimi=" . $aines . ")");
    $insert->execute();
    
    $insert2 = $TKyhteys->prepare("INSERT INTO ruoanainekset (RuokaID, AinesID, maara) VALUES (" . $ruokaID . ", " . null . "," . $maara . ")");
    $insert2->execute();
}
 
?>
