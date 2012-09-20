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
?>
<!@page contentType="text/html" pageEncoding="UTF-8" charset=UTF-8>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Reseptisivu</title>
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
                    <a href="selaa.html">Reseptit</a>
                    <ul>
                        <li><a href="lisaa.html">Lisää uusi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../ateria/selaa.html">Ateriat</a>
                    <ul>
                        <li><a href="../ateria/lisaa.html">Lisää uusi</a></li>
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
                <p><b>Valmistusaika: <?php echo $aika ?></b>
                <table>
                    <tr>
                        <th>Aines</th>
                        <th>Määrä</th>
                    </tr>
                    <tr>
                        <td><a href="aines.html">tänne</a></td>
                        <td>dataa tietokannasta</td>
                    </tr>
                </table>
                </p>
                <p><b>Valmistusohje:</b><br><?php echo $ohje ?></p>
                <p>
                <table><b>Kommentit</b>
                    <tr>
                        <td>[Kommentoijan nimi]</td>
                        <td>[Kommentti]</td>
                    </tr>
                </table>
                </p>
                <p><br><br>Sivuston kuvat ovat sivulta <a href="http://www.foodphotosite.com/">FoodPhotoSite.com</a></p>
            </div>
        </div>
    </body>
</html>