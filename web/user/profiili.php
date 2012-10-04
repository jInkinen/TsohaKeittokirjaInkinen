<!-- 
    Document   : profiili
    Created on : 14.9.2012, 19:21:16
    Author     : juhainki
-->
<?php
// Tarkistetaan onko käyttäjä jo kirjautunut sisään.
// Jos on, ohjataan hänet omalle profiilisivulleen.
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: rek.php");
    exit();
}
?>
<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Profiili</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php
        include("../valikko.php");
        include("../TKyhteys.php");
        ?>
        <div id="raami">
            <div id="sisus">
                <?php
                $kysely = $TKyhteys->prepare("SELECT * FROM kayttaja WHERE ID='" . $_SESSION["kaytID"] . "'");
                $kysely->execute();
                $tulos = $kysely->fetch();
                ?>
                <h1>Profiili - <?php echo $tulos["nimi"] . " (ID: " . $tulos["ID"] .")"?></h1>
                <p>Tämä on käyttäjäprofiilisi. Täältä voit poistaa profiilin tai kirjautua ulos.</p>
                <form action="../kirjaaulos.php">
                    <input id="kirjauduulos" type="submit" value="Kirjaudu ulos">
                </form><br><br>
                <form>
                    [TODO]
                    <input id="poistak" type="button" value="Poista käyttäjätunnus">
                </form>
            </div>
        </div>
    </body>
</html>
