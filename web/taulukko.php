<?php

/*
 * author: juhainki
 * file: taulukko
 * luo taulukon annettujen parametrien mukaan. Tarkoituksena säästää copy-paste-koodia.
 */

//Parametrien käsittely
$taulu = $_GET["t"];
$jarjestys = $_GET["j"];
$ascdesc = $_GET["ad"];
if (!isset($jarjestys) || !isset($taulu) || !isset($ascdesc)) {
    die("järjestysta ei annettu sivulle.");
}

//Luodaan TIKA-yhteys
include("../TKyhteys.php");

//Valmistellaan kysely ja suoritetaan se
$kysely = $TKyhteys->prepare("SELECT * FROM " . $taulu . " ORDER BY " . $jarjestys . " " . $ascdesc);
$kysely->execute();

//Kirjoitetaan tulokset sivulle
$i = 0;
while ($tulos = $kysely->fetch()) {
    //Käytetään kahta eri tyyliä taulukon luettavuuden vuoksi
    $i++;
    if ($i % 2 != 0) {
        echo "<tr class=alt>";
    } else {
        echo "<tr>";
    }
    
    //Syötetään taulukkoon haluttu rivi
    if ($taulu === "aines") {
        echo "<td>" . $tulos["ID"] . "</td>";
        echo "<td><a href=aines.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
        echo "<td>" . $tulos["hinta"] . "</td>";
        echo "<td>" . $tulos["ravinto"] . "</td></tr>";
    } else if ($taulu === "ruoka") {
        echo "<td>" . $tulos["ID"] . "</td>";
        echo "<td><a href=resepti.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
        echo "<td>" . $tulos["aika"] . "</td></tr>";
    } else {
        die("Tuntematon taulu annettu. Palaa edelliselle sivulle ja kokeile uudestaan.");
    }
}
?>