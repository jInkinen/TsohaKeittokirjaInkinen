<?php

$ID = $_GET["id"];
if (!isset($ID)) {
    die("virhe kuvan id:n kanssa");
}

include("../TKyhteys.php");

$kuva = $TKyhteys->prepare("SELECT * FROM kuvat WHERE RuokaID = ?");
$kuva->execute(array($ID));

if ($data = $kuva->fetch()) {
    header("Content-type: " . mime_content_type($data["kuva"]));
    print $data["kuva"];
}
?>
