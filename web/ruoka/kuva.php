<?php

$ID = $_GET["id"];
if (!isset($ID)) {
    exit();
}

include("../TKyhteys.php");

$kuva = $TKyhteys->prepare("SELECT * FROM kuvat WHERE RuokaID = ?");
$kuva->execute(array($ID));

if ($data = $kuva->fetch()) {
    header("Content-type: image/jpeg");
    echo $data["kuva"];
}
?>
