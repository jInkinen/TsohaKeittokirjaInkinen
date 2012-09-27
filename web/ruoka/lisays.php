<?php
$nimi = $_POST["nimi"];
$aika = $_POST["aika"];
$ohje = $_POST["ohje"];
$ainekset = $_POST["aines"];

if (!isset($nimi) || !isset($aika) || !isset($ohje) || !isset($ainekset)) {
    die("Sivun vaatimia arvoja ei ole asetettu. Tulithan sivulle käyttäen reseptin lisäys lomaketta?");
}

// TODO tieto-virheiden käsittely

include("../TKyhteys.php");
$insert = $TKyhteys->prepare("INSERT INTO ruoka (nimi, aika, ohje) VALUES (?, ?, ?)");
$insert->execute(array($nimi, $aika, $ohje));

//TODO ohjaus luodun reseptin sivulle
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Resepti - Lisää ainekset</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <form id="lisaaForm" action="lisaaAinekset.php" method="post">
            <?php
            for ($i = 0; $i <= $ainekset; $i++) {
                echo "Aines: <input name=aines[] type=text> ";
                echo "Määrä: <input name=maara[] type=text><br>";
            }
            ?>
            <input id="lisaa" type="submit" value="Lähetä">
        </form>
    </body>
</html>