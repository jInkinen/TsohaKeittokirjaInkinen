<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="tyyli/tyylit.css">
        <title>Keittokirja Online - Hakutulokset</title>
    </head>
    <body>
        <?php
        include("valikko.php");
        ?>
        <div id="raami">
            <div id="sisus">
                <?php
                if (!isset($_GET["hakusana"])) {
                    die("HAKU: Hakusanaa ei asetettu");
                }
                $hakusana = $_GET["hakusana"];
                if ($hakusana == "") {
                    $hakusana = "%";
                }
                ?>
                <h1>Hakutulokset - [<?php echo $hakusana ?>]</h1></br>
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
                    $TKtaulu = "ruokatyypit";
                    $sort = "tyyppi";
                    teeTaulukko($TKtaulu, $sort, $sort2, $arvo, $TKyhteys);
                    if ($arvo != "%") {
                        $sort = "laji";
                        teeTaulukko($TKtaulu, $sort, $sort2, $arvo, $TKyhteys);
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
