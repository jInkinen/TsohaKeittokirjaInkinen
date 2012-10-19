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
        <title>Keittokirja Online - Ostoslista</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php
        include("../valikko.php");
        ?>
        <div id="raami">
            <div id="sisus">
                <h1>Ostoslista</h1>

		<table>
                <?php
                include("../TKyhteys.php");

                // Valitaan ostoskorin rivit, jotka kuuluvat käyttäjälle
                $kori = $TKyhteys->prepare("SELECT * FROM ostoskori WHERE kayttaja = ?");
		$kori->execute(array($_SESSION["kaytID"]));
                // Valitaan aputaulusta rivit, jotka vastaavat valittuja ruokia
		while ($rivi = $kori->fetch()) {
                    $ruoka = $TKyhteys->prepare("SELECT * FROM ruoanainekset WHERE RuokaID = ?");
                    $ruoka->execute(array($rivi["RuokaID"]));
                    while ($riviR = $ruoka->fetch()) {
                        $aines = $TKyhteys->prepare("SELECT * FROM aines WHERE ID = ?");
                        $aines->execute(array($riviR["AinesID"]));
                        $ainesRivi = $aines->fetch();
			//tulostus
                        echo "<tr><td>" . $ainesRivi["nimi"] . "</td><td>";
			echo $riviR["maara"] * $rivi["maara"] . " " . $ainesRivi["yksikko"] . "<td></tr>";
                    }
                }
                ?>
		</table>
            </div>
        </div>
    </body>
</html>
