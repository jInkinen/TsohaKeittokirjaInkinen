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
                <?php
                include("kuva.php?id=" . $ID);
                ?>
                <p><b>Valmistusaika:<?php echo $aika ?></b>
                    <?php
                    if ($_SESSION["kirjautunut"] == 1) {
                        echo "<form id=lisaaForm action='../user/lisaakoriin.php' method=post>";
                        //Säilötään reseptin ID lähetettäväksi ja kerrotaan että kyseessä on reseptin ID
                        echo "<input name=rID type=hidden value=" . $ID . ">";
                        echo "<input name=tyyppi type=hidden value=r>";
                        echo "<input type=submit value='Lisää ostoskoriin'>";
                        echo "</form>";
                    }
                    ?>
                <table>
                    <tr>
                        <th>Aines</th>
                        <th>Määrä</th>
                    </tr>
                    <?php
                    $ainekset = $TKyhteys->prepare("SELECT * FROM ruoanainekset WHERE RuokaID = ?");
                    $ainekset->execute(array($ID));
                    //luodaan taulukko
                    $i = 0;
                    while ($aines = $ainekset->fetch()) {
                        $akys = $TKyhteys->prepare("SELECT * FROM aines WHERE ID = ?");
                        $akys->execute(array($aines["AinesID"]));
                        $animi = $akys->fetch();

                        $i++;
                        if ($i % 2 != 0) {
                            echo "<tr class=alt>";
                        } else {
                            echo "<tr>";
                        }
                        echo "<td><a href=../aines/aines.php?id=" . $aines["AinesID"] . ">" . $animi["nimi"] . " " . $aines["maara"] . "</a></td>";
                        echo "<td>" . $aines["maara"] . "</td></tr>";
                    }
                    ?>
                </table>
                </p>
                <p><b>Valmistusohje:</b><br><?php echo $ohje ?></p>
                <p>
                    <?php
                    if ($_SESSION["kirjautunut"] == 1) {
                        echo "Kommentoi:<br><form id=lisaaForm action='lisaakommentti.php' method=post>";
                        //Säilötään reseptin ID lähetettäväksi
                        echo "<input name=ID type=hidden value=" . $ID . ">";
                        echo "<textarea name=teksti rows=5 cols=50>Kommentti</TEXTAREA>";
                        echo "<input type=submit value='Lähetä kommentti'>";
                        echo "</form>";
                    }
                    ?>
                <table><b>Kommentit [WIP]</b>
                    <tr>
                        <td>[Kommentoijan nimi]</td>
                        <td>[Kommentti]</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
