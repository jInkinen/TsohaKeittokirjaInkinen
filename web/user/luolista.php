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

		// select RA.AinesID, SUM(RA.maara*OK.maara) summa from ostoskori OK, ruoanainekset RA WHERE OK.RuokaID=RA.RuokaID AND kayttaja=10 group by AinesID;
                // Valitaan ostoskorin rivit, jotka kuuluvat käyttäjälle
                $kori = $TKyhteys->prepare("select RA.AinesID, SUM(RA.maara*OK.maara) summa from ostoskori OK, ruoanainekset RA WHERE OK.RuokaID=RA.RuokaID AND kayttaja = ? group by AinesID");
		$kori->execute(array($_SESSION["kaytID"]));
                // Valitaan aputaulusta rivit, jotka vastaavat valittuja aineksia, jotta saadan esitettyä aineksen nimi ja yksikkö
		$i = 0;
		while ($rivi = $kori->fetch()) {
                        $aines = $TKyhteys->prepare("SELECT * FROM aines WHERE ID = ?");
                        $aines->execute(array($rivi["AinesID"]));
                        $ainesRivi = $aines->fetch();
			//tulostus
			if ($rivi["summa"] > 0) {
                        	echo "<tr><td>" . $ainesRivi["nimi"] . "</td><td>";
				echo $rivi["summa"] . " " . $ainesRivi["yksikko"] . "<td></tr>";
                    		$i++;
			}
                }
                ?>
		</table>
		<?php echo "Yhteensä tuotteita ostolistassa: " . $i;?>
            </div>
        </div>
    </body>
</html>
