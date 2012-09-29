<?php
$nimi = $_POST["nimi"];
$aika = $_POST["aika"];
$ohje = $_POST["ohje"];
$ainekset = $_POST["ainekset"];

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
    <?php include("../valikko.php"); ?>
    <body>
        <div id="raami">
            <div id="sisus">
                <form action="lisaaAinekset.php" method="post">
                    <?php
                    //Säilötään parametrinä tuotu ruoan nimi piilotettuun kenttään,
                    //jotta se voidaan nätisti viedä eteenpäin seuraavalle sivulle post-menetelmällä.
                    echo "<input name=ruokaID type=hidden value='" . $nimi . "'>";
                    //Lisätään tarvittu määrä kenttiä reseptin aineksia varten
                    for ($i = 1; $i <= $ainekset; $i++) {
                        echo "Aines: <input name=aines[] type=text> ";
                        echo "Määrä: <input name=maara[] type=text> (ilman yksikköä)<br>";
                    }
                    ?>
                    <input id="lisaa" type="submit" value="Lähetä">
                </form>
            </div>
        </div>
    </body>
</html>
