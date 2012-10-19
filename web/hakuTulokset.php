<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="tyyli/tyylit.css">
        <title>Keittokirja Online - Hakutulokset</title>
    </head>
    <body>
        <?php
        include("valikko.php");
        if (!isset($_GET["hakusana"])) {
            die("HAKU: Hakusanaa ei asetettu");
        }
        $hakusana = $_GET["hakusana"];
        ?>

        <div id="raami">
            <div id="sisus">
                <h1>Hakutulokset - <?php echo $hakusana ?></h1></br>
                <h3>Reseptit:</h3><br>
                <table>
                    <?php
                    $sort = "nimi";
                    $sort2 = "ASC";
                    $TKtaulu = "ruoka";
                    $arvo = $hakusana;
                    include("taulukko.php");
                    include("TKyhteys.php");
                    teeTaulukko($TKtaulu, $sort, $sort2, $arvo, $TKyhteys);
                    ?>
                </table>
                <h3>Ateriat:</h3><br>
                <table>
                    <?php
                    $TKtaulu = "ateria";
                    teeTaulukko($TKtaulu, $sort, $sort2, $arvo, $TKyhteys);
                    ?>
                </table>
                <h3>Ainekset:</h3><br>
                <table>
                    <?php
                    $TKtaulu = "aines";
                    teeTaulukko($TKtaulu, $sort, $sort2, $arvo, $TKyhteys);
                    ?>
                </table>
                <h3>Tyyppi / Laji:</h3><br>
                <table>
                    <?php
                    $tyypit = $TKyhteys->prepare("SELECT * FROM ruokatyypit WHERE laji LIKE ? OR tyyppi LIKE ? ");
                    $tyypit->execute(array('%' . $arvo . '%', '%' . $arvo . '%'));
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
