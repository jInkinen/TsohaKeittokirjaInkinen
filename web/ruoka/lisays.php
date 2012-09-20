<?php
$nimi = $_POST["nimi"];
$aika = $_POST["aika"];
$ohje = $_POST["ohje"];
$aines = $_POST["aines"];

echo "Lisätty seuraavat tiedot.<br>";
echo "Nimi: $nimi<br>";
echo "Aika: $aika<br>";
echo "$ohje<br>";
echo "$aines<br>";

// TODO tieto-virheiden käsittely
try {
    include("../TKyhteys.php");
    $insert = $TKyhteys->prepare("INSERT INTO ruoka (nimi, aika, ohje) VALUES (?, ?, ?)");
    $insert->execute(array($nimi, $aika, $ohje));
} catch (PDOException $e) {
    die("Virhe tietokantayhteydessä: " . $e->getMessage());
}

//TODO ohjaus luodun reseptin sivulle
?>

