<?php
/* author: juhainki
 * Kirjautumisen / rekisteröitymisen hallinta.
 */

// Jos käyttäjä on jo kirjautunut sisään, ohjataan hänet omaan profiiliinsa.
session_start();
if ($_SESSION["kirjautunut"] == 1) {
    header("Location: user/profiili.php");
    exit();
}

include("TKyhteys.php");

$nimi = $_POST["nimi"];
// suojataan salasana md5-muunnolla, jotta sitä ei tallenneta selväkielisenä
$ss = md5($_POST["ss"]);

if (!isset($nimi) || !isset($ss)) {
    die("Virhe: Salasanaa tai käyttäjänimeä ei annettu.");
}

if ($nimi == "" || $ss == "") {
    die("Virhe: Salasana tai käyttäjänimi on tyhjä.");
}

$kysely = $TKyhteys->prepare("SELECT * FROM kayttaja WHERE nimi='" . $nimi . "'");
$kysely->execute();

$tulos = $kysely->fetchAll();
$maara = count($tulos);
if ($maara == 1) { //Käyttäjä olemassa - Yritetään kirjautua sisään
    $oikeass = $tulos[0]["salasana"];
	echo $salasana . " " . $ss;
    if ($oikeass == $ss) { //Annettu salasana on oikea.
        $_SESSION["kirjautunut"] = 1;
        $_SESSION["kaytID"] = $tulos[0]["ID"];
        header("Location: user/profiili.php");
    } else {
        die("Tili on jo luotu samalla nimellä. Annoitko oikean salasanan?");
    }
    
}
if ($maara == 0) { //Käyttäjää ei ole, luodaan se.
    $insert = $TKyhteys->prepare("INSERT INTO kayttaja (nimi, salasana, oikeudet) VALUES (?, ?, ?)");
    $insert->execute(array($nimi, $ss, 0));
    header("Location: index.php");
}
?>
