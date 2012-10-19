<?php
/*
 * lisäys.php:n tehtävä on tallentaa uusi ruoka tietokantaan,
 * sekä lisätä sitä vastaavat ainekset yms oheistiedot omiin
 * tauluihinsa.
 */

session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

include("../TKyhteys.php");

/*
 * Ruoan lisäys
 */

$nimi = $_POST["nimi"];
$aika = $_POST["aika"];
$ohje = $_POST["ohje"];

if (!isset($nimi) || !isset($aika) || !isset($ohje)) {
    die("Sivun vaatimia arvoja ei ole asetettu. Tulithan sivulle käyttäen reseptin lisäys lomaketta?");
}

if ($nimi == "") {
    die("Reseptin nimeä ei annettu.");
}

// Lisätään ruoka omaan tauluunsa
$insert = $TKyhteys->prepare("INSERT INTO ruoka (nimi, aika, ohje) VALUES (?, ?, ?)");
$insert->execute(array($nimi, $aika, $ohje));

/*
 * Haetaan juuri luodulle ruokariville annettu ID
 * $RuokaID säilöö nyt uuden ruoan ID:n
 */

$haku = $TKyhteys->prepare("SELECT ID, nimi FROM ruoka WHERE nimi = ?");
$haku->execute(array($nimi));
$hakuRivi = $haku->fetch();
$RuokaID = $hakuRivi["ID"];



/*
 * Ainesten lisäys
 */

$aines = $_POST["aines"];
$yksikko = $_POST["yksikko"];
$maara = $_POST["maara"];

if (!isset($aines)) {
    $laji = "";
}
if (!isset($yksikko)) {
    $tyyppi = "";
}
if (!isset($maara)) {
    $tyyppi = "";
}

for ($i = 0; $i < count($aines); $i++) {
    // Ei lisätä tyhjiä rivejä turhaan.
    if ($aines[$i] == "") {
        continue;
    }

    //Etsitään onko aines jo tietokannassa.
    //Jos on, niin lisätään vain ruoanainekset tauluun viite
    $ainesKysely = $TKyhteys->prepare("SELECT nimi, ID FROM aines WHERE nimi = ?");
    $ainesKysely->execute(array($aines[$i]));
    $ainekset = $ainesKysely->fetchAll;
    
    if (count($ainekset) > 0) {
        $lisaaRuoanAinekset = $TKyhteys->prepare("INSERT INTO ruoanainekset (RuokaID, AinesID, maara) VALUES (?, ?, ?)");
        $lisaaRuoanAinekset->execute(array($RuokaID, $ainekset["ID"], $maara[$i]));
        continue;
    }
    
    
    //Uuden aineksen lisäys
    $ainesLis = $TKyhteys->prepare("INSERT INTO aines (nimi, yksikko) VALUES (?, ?)");
    $ainesLis->execute(array($aines[$i], $yksikko[$i]));

    $ainesKysely2 = $TKyhteys->prepare("SELECT nimi, ID FROM aines WHERE nimi = ?");
    $ainesKysely2->execute(array($aines[$i]));
    $ainekset = $ainesKysely2->fetchAll;

    $lisaaRuoanAinekset = $TKyhteys->prepare("INSERT INTO ruoanainekset (RuokaID, AinesID, maara) VALUES (?, ?, ?)");
    $lisaaRuoanAinekset->execute(array($RuokaID, $ainekset["ID"], $maara[$i]));
}


/*
 * Lajin ja tyypin lisäys.
 */

$tyyppi = $_POST["tyyppi"];
$laji = $_POST["laji"];

if (!isset($laji)) {
    $laji = "";
}
if (!isset($tyyppi)) {
    $tyyppi = "";
}

$tyypit = $TKyhteys->prepare("INSERT INTO ruokatyypit (RuokaID, tyyppi, laji) VALUES (?, ?, ?)");
$tyypit->execute(array($RuokaID, $tyyppi, $laji));

// Lisää tietokantaan


/*
 * Kuvan tallennus
 */

if (isset($_FILES["kuva"])) {
    // 1. Asetetaan osoitin tiedoston alkuun
    $kuva = fopen($_FILES["kuva"]["tmp_name"], "r");
    // 2. Luetaan data
    $data = fread($kuva, filesize($_FILES["kuva"]["tmp_name"]));
    // 3. Siirretään tiedosto tietokantaan
    $TKkuva = $TKyhteys->prepare("INSERT INTO kuvat (RuokaID, kuva) VALUES (?, ?)");
    $TKkuva->execute(array($RuokaID, $data));
}


//Uudelleenohjaus juuri luodun reseptin sivulle
header("Location: resepti.php?id=" . $RuokaID);
?>
