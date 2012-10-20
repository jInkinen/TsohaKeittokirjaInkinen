<!-- 
    Document   : rekisteröidy / kirjaudu sisään
    Created on : 14.9.2012, 19:35:24
    Author     : juhainki
-->
<?php
// Tarkistetaan onko käyttäjä jo kirjautunut sisään.
// Jos on, ohjataan hänet omalle profiilisivulleen.
session_start();
if ($_SESSION["kirjautunut"] == 1) {
    header("Location: profiili.php");
    exit();
}
?>

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Tilihallinta</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Luo uusi käyttäjätunnus / Kirjaudu sisään</h1>
                <p>Syötä käyttäjätunnus ja salasana. Jos käyttäjätunnusta ei ole, se luodaan, jonka jälkeen voit kirjautua sisään sitä käyttäen.</p>
                <form id="rek" action="kirrek.php" method="post">
                    Tunnus: <input name="nimi" type="text"><br>
                    Salasana: <input name="ss" type="password"><br>
                    <input id="luo" type="submit" value="Lähetä">
                </form>
            </div>
        </div>
    </body>
</html>
