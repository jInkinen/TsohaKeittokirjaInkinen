<!-- 
    Document   : ostoskori
    Created on : 14.9.2012, 19:21:16
    Author     : juhainki
-->
<?php
// Varmistetaan, että käyttäjä on kirjautunut
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}
?>
<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ostoskori</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php
        include("../valikko.php");
        include("../TKyhteys.php");
        $kysely = $TKyhteys->prepare("SELECT * FROM kayttaja WHERE ID = ?");
        $kysely->execute(array($_SESSION["kaytID"]));
        $kayttaja = $kysely->fetch();
        ?>
        <div id="raami">
            <div id="sisus">
                <h1>Ostoskori - <?php echo $kayttaja["nimi"]; ?></h1>
                <br>
                <form id="tyhjennakori" action="korityhjaksi.php" method="post">
                    <input id="tyhjenna" type="submit" value="Tyhjennä ostoskori">
                </form>
                <form id="luolista" action="luolista.php" method="post">
                    <input id="listaksi" type="submit" value="Luo ostoslista">
                </form>
                <br>
                <table>
                    <tr>
                        <th>Resepti</th>
                        <th>Ruokailijat</th>
                    </tr>
                    <?php
                    $kori = $TKyhteys->prepare("SELECT * FROM ostoskori WHERE kayttaja = ?");
                    $kori->execute(array($_SESSION["kaytID"]));

                    $i = 0;
                    while ($rivi = $kori->fetch()) {
                        $i++;
                        if ($i % 2 != 0) {
                            echo "<tr class=alt>";
                        } else {
                            echo "<tr>";
                        }
                        $ruoka = $TKyhteys->prepare("SELECT ID, nimi FROM ruoka WHERE ID = ?");
                        $ruoka->execute(array($rivi["RuokaID"]));
                        $r = $ruoka->fetch();
                        echo "<td>" . $r["nimi"] . "</td>";
                        echo "<td>" . $rivi["maara"] . " henkilö(ä)";
                        // Ruokailijoiden määrän muutos muutamaaraa sivun avulla (param m arvolla 0 poistaa)
                        echo " | Muuta: <a href=muutamaaraa.php?id=" . $r["ID"] . "&m=" . ($rivi["maara"] + 1) . "><b>+1</b></a>";
                        echo " <a href=muutamaaraa.php?id=" . $r["ID"] . "&m=" . ($rivi["maara"] - 1) . "><b>-1</b></a>";
                        echo " <a href=muutamaaraa.php?id=" . $r["ID"] . "&m=0><b>X</b></a>";
                        echo "</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
