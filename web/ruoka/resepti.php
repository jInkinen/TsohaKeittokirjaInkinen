<!-- 
    Document   : reseptisivu
    Created on : 20.9.2012, 14:52:17
    Author     : juhainki
-->
<?php
session_start();
//Tuodaan tika-yhteyden määritelmät
include("../TKyhteys.php");
//Otetaan muistiin ID, jonka perusteella tunnistetaan haluttu resepti.
$ID = $_GET["id"];
//Haetaan tietokannasta kyseinen tietue
$kysely = $TKyhteys->prepare("SELECT * FROM ruoka WHERE ID=" . $ID);
$kysely->execute();
//Tallennetaan noudetut tiedot käyttöä varten muuttujiin
$tulos = $kysely->fetch();
$nimi = $tulos["nimi"];
$aika = $tulos["aika"];
$ohje = $tulos["ohje"];
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
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1><?php echo $nimi ?></h1>
                <p><b>Valmistusaika:<?php echo $aika ?></b>
                    <?php
                    if ($_SESSION["kirjautunut"] == 1) {
                        echo "<form id=lisaaForm action='../user/lisaakoriin.php' method=post>";
                        echo "</form>";
                    }
                    ?>
                <table>
                    <tr>
                        <th>Aines</th>
                        <th>Määrä</th>
                    </tr>
                    <?php
                    $kysely2 = $TKyhteys->prepare("SELECT * FROM ruoanainekset WHERE ruokaID=" . $ID);
                    $kysely2->execute();
                    //Tallennetaan noudetut tiedot käyttöä varten muuttujiin
                    $tulos2 = $kysely2->fetch();
                    $i = 0;
                    while ($tulos2 = $kysely->fetch()) {
                        $i++;
                        if ($i % 2 != 0) {
                            echo "<tr class=alt>";
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>" . $tulos["ID"] . "</td>";
                        echo "<td><a href=resepti.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
                        echo "<td>" . $tulos["aika"] . "</td></tr>";
                    }
                    ?>
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
            </div>
        </div>
    </body>
</html>