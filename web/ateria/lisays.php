<?php
$nimi = $_POST["nimi"];
$kuvaus = $_POST["kuvaus"];

echo "Lisätty seuraavat tiedot.<br>";
echo "Nimi: $nimi<br>";
echo "Aika: $kuvaus<br>";

// TODO tieto-virheiden käsittely
try {
    include("../TKyhteys.php");
    $insert = $TKyhteys->prepare("INSERT INTO ateria (nimi, kuvaus) VALUES (?, ?)");
    $insert->execute(array($nimi, $kuvaus));
} catch (PDOException $e) {
    die("Virhe tietokantayhteydessä: " . $e->getMessage());
}

//TODO ohjaus luodun aterian sivulle
?>

