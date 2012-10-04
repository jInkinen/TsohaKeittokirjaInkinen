<!-- 
    Document   : ateria
    Created on : 20.9.2012, 15:46:50
    Author     : juhainki
-->
<?php
//Tuodaan tika-yhteyden määritelmät
include("../TKyhteys.php");

//Otetaan muistiin ID, jonka perusteella tunnistetaan käytössä oleva ateria
if (!isset($_GET["id"])) {
    die("ateria.php: ei oikeaa IDtä annettu");
}
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
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1><?php echo $nimi ?></h1>
                <p>
                    <i><?php echo $kuvaus ?></i>
                </p>
                <table>
                    <tr>
                        <th>Aterian osat:</th>
                        <th><form><input type="submit" value="Lisää uusi ruoka"></form></th>
                    </tr>
                    <?php
                    include ("../TKyhteys.php");

                    $kysely = $TKyhteys->prepare("SELECT * FROM aterianruoat WHERE aID=" . $ID);
                    $kysely->execute();
                    //Käydään läpi saatu tulos
                    while ($tulos = $kysely->fetch()) {
                        //Käytetään kahta eri tyyliä taulukon luettavuuden vuoksi
                        $i++;
                        if ($i % 2 != 0) {
                            echo "<tr class=alt>";
                        } else {
                            echo "<tr>";
                        }

                        //Selvitetään ruoka-taulusta ruoan nimi saadun ID:n perusteella
                        $kysely2 = $TKyhteys->prepare("SELECT nimi FROM ruoka WHERE rID=" . $tulos["rID"]);
                        $kysely2->execute();
                        $ruoanNimi = $kysely->fetch();
                        //Syötetään taulukkoon haluttu rivi
                        echo "<td><a href=resepti.php?id=" . $tulos["rID"] . ">" . $ruoanNimi . "</a></td>";
                        echo "<td>" . $tulos["maara"] . "</td></tr>";
                    }
                    ?>
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