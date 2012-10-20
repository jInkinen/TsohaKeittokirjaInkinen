<?php
session_start();

if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}

if (!isset($_POST["ID"])) {
    die("lisaaRuoka.php: tarvittuja arvoja ei annettu");
}
?>
<html>
    <head>
        <title>Keittokirja Online - Lisää Ruoka Ateriaan</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php
        include("../valikko.php");
        include("../TKyhteys.php");
        ?>

        <div id="raami">
            <div id="sisus">
                <h1>Lisää ruoka ateriaan</h1>	

                <form action="lisaaRuokaDo.php" method="post">
                    <?php
                    //Viedään eteenpäin aterian ID piilotetussa kentässä.
                    echo "<input name=aID type=hidden value=" . $_POST["ID"] . ">";
                    ?>
                    <select name="ruoka">
                        <option value=-1>Valitse ruoka</option>
                        <?php
                        $kysely = $TKyhteys->prepare("SELECT ID, nimi FROM ruoka ORDER BY nimi ASC");
                        $kysely->execute();
                        while ($tulos = $kysely->fetch()) {
                            echo "<option value=" . $tulos["ID"] . ">";
                            echo $tulos["nimi"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Lisää">
                </form>
            </div>
        </div>
    </body>
</html>
