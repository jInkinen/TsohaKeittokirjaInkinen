<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include("../valikko.php");
        include("../TKyhteys.php");

        if (isset($_GET["hakusana"])) {
            die("HAKU: Hakusanaa ei asetettu");
        }
        $hakusana = $_GET["hakusana"];
        ?>
        <div id="raami">
            <div id="sisus">
                <h1>Hakutulokset - <?php $hakusana ?></h1></br>
                <h3>Reseptit:</h3><br>
                <table>
                    <?php
                    $sort = "ID";
                    $sort2 = "ASC";
                    $taulu = "ruoka";
                    include("taulukko.php?");
                    ?>
                </table>
                <h3>Ateriat:</h3><br>
                <table>
                    <?php
                    $sort = "ID";
                    $sort2 = "ASC";
                    $taulu = "ateria";
                    include("taulukko.php?");
                    ?>
                </table>
                <h3>Ainekset:</h3><br>
                <table>
                    <?php
                    $sort = "ID";
                    $sort2 = "ASC";
                    $taulu = "aines";
                    include("taulukko.php?");
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
