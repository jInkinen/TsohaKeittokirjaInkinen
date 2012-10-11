<?php

/*
 * author: juhainki
 * file: taulukko
 * luo taulukon annettujen parametrien mukaan. Tarkoituksena säästää copy-paste-koodia.
 */

//Parametrien käsittely
if (!isset($taulu) || !isset($sort) || !isset($sort2)) {
    die("Parametrivirhe.");
}
if (!isset($arvo)) {
    $arvo = "%";
}

//Luodaan TIKA-yhteys
include($_SERVER["DOCUMENT_ROOT"] . "/tsoha/TKyhteys.php");

//Valmistellaan kysely ja suoritetaan se
$kysely = $TKyhteys->prepare("SELECT * FROM " . $taulu . " WHERE " . $sort . " LIKE '%" . $arvo . "%' ORDER BY " . $sort . " " . $sort2);
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
    if ($taulu == "aines") {
        echo "<td>" . $tulos["ID"] . "</td>";
        echo "<td><a href=/tsoha/aines/aines.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
        echo "<td>" . $tulos["hinta"] . "</td>";
        echo "<td>" . $tulos["ravinto"] . "</td></tr>";
    } else if ($taulu == "ruoka") {
        echo "<td>" . $tulos["ID"] . "</td>";
        echo "<td><a href=/tsoha/ruoka/resepti.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
        echo "<td>" . $tulos["aika"] . "</td></tr>";
    } else if ($taulu == "ateria") {
        echo "<td>" . $tulos["ID"] . "</td>";
        echo "<td><a href=/tsoha/ateria/ateria.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td></tr>";
    } else {
        echo "virhe";
        die("taulukko.php: Tuntematon taulu annettu. Palaa edelliselle sivulle ja kokeile uudestaan.");
    }
}
?>
