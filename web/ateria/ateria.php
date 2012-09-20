<!-- 
    Document   : ateria
    Created on : 20.9.2012, 15:46:50
    Author     : juhainki
-->
<?php
//Tuodaan tika-yhteyden määritelmät
include("../TKyhteys.php");
//Otetaan muistiin ID, jonka perusteella tunnistetaan haluttu resepti.
$ID = $_GET["id"];
//Haetaan tietokannasta kyseinen tietue
$kysely = $TKyhteys->prepare("SELECT * FROM ateria WHERE ID=" . $ID);
$kysely->execute();
//Tallennetaan noudetut tiedot käyttöä varten muuttujiin
$tulos = $kysely->fetch();
$nimi = $tulos["nimi"];
$kuvaus = $tulos["kuvaus"];
?>
<!@page contentType="text/html" pageEncoding="UTF-8" charset=UTF-8>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ateriasivu</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <div id="banneri">
            <ul>
                <li>
                    <form id="haku" action="">
                        <input id="etsi" type="text" placeholder="Mitä etsit?">
                        <input id="hae" type="submit" value="Hae">
                    </form>
                </li>
            </ul>
        </div>
        <div>
            <ul id="navi">
                <li><a href="../index.html">Etusivu</a></li>
                <li>
                    <a href="../selaa.php">Reseptit</a>
                    <ul>
                        <li><a href="../lisaa.php">Lisää uusi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="selaa.php">Ateriat</a>
                    <ul>
                        <li><a href="lisaa.php">Lisää uusi</a></li>
                    </ul>
                </li>
                <li><a href="../aines/selaa.html">Ainekset</a></li>
                <li>
                    <a href="../user/profiili.html">Käyttäjä</a>
                    <ul>
                        <li><a href="../user/kori.html">Ostoskori</a></li>
                        <li><a href="../user/rek.html">Rekisteröidy</a></li>
                        <li><a href="../user/kir.html">Kirjaudu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="raami">
            <div id="sisus">
                <h1><?php echo $nimi ?></h1>
                <p>
                    <?php echo $kuvaus ?>
                </p>
                <table>
                    <tr>
                        <th>Ruoka</th>
                    </tr>
                    <tr>
                        <td><a href="../ruoka/resepti.php?id=">ruoka [lisää TIKA toiminto]</a></td>
                    </tr>
                </table>
                </p>
                <p>
                <table><b>Kommentit</b>
                    <tr>
                        <td>[Kommentoijan nimi]</td>
                        <td>[Kommentti]</td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
    </body>
</html>