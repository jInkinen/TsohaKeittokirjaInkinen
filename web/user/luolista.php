<?php
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="raami">
            <div id="sisus">
                <h1>Ostoslista</h1>
                <?php
                include("../valikko.php");
                include("../TKyhteys.php");
/*
                // Valitaan ostoskorin rivit, jotka kuuluvat käyttäjälle
                $kori = $TKyhteys->prepare("SELECT * FROM ostoskori WHERE kayttaja = ?");
                $kori->execute(array($_SESSION["kaytID"]));
                // Luodaan lista, johon ainekset tallennetaan
                $ainekset = array();
                // Valitaan aputaulusta rivit, jotka vastaavat valittuja ruokia
                while ($rivi = $kori->fetch()) {
                    $ruoka = $TKyhteys->prepare("SELECT nimi FROM ruoanainekset WHERE RuokaID = ?");
                    $ruoka->execute(array($rivi["RuokaID"]));
                    // Lisätään listaan rivit, jotka löydettiin
                    while ($riviR = $ruoka->fetch()) {
                        $aines = $TKyhteys->prepare("SELECT nimi FROM aines WHERE ID = ?");
                        $aines->execute(array($riviR["ID"]));
                        $ainesRivi = $aines->fetch();

                        $uusiRivi = [$ainesRivi["nimi"], $riviR["maara"]];
                        $ainekset[] = $uusiRivi;
                    }
                }

                for ($i = 0; $i <= count($ainekset); $i++) {
                    if ($i % 2 != 0) {
                        echo "<tr class=alt>";
                    } else {
                        echo "<tr>";
                    }
                    echo "<td>" . $ainekset[$i][0] . "</td>";
                    echo "<td>" . $ainekset[$i][1] . "</td></tr>";
                }
  */              ?>
            </div>
        </div>
    </body>
</html>
