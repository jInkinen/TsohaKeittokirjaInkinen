<!-- 
    Document   : ostoskori
    Created on : 14.9.2012, 19:21:16
    Author     : juhainki
-->
<?php
// Tarkistetaan onko käyttäjä jo kirjautunut sisään.
// Jos on, ohjataan hänet omalle profiilisivulleen.
session_start();
if ($_SESSION["kirjautunut"] != 1) {
    header("Location: ../error.php");
    exit();
}
?>
<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ostoskori</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php
        include("../valikko.php");
        include("../TKyhteys.php");
        $_SESSION["kirjautunut"] != 1
        
        ?>
        <div id="raami">
            <div id="sisus">
                <h1>Ostoskori - [TIETOKANNASTA NIMI]</h1>
                <br>
                <form id="tyhjennakori" action="">
                    <input id="tyhjenna" type="submit" value="Tyhjennä ostoskori">
                </form><br>
                <table>
                    <tr>
                        <th>Aines</th>
                        <th>Määrä</th>

                    </tr>
                    <tr>
                        
                        <td>tänne</td>
                        <td>dataa TIKAsta</td>
                        <td>
                            <form id="poistakorista" action="">
                                <input id="poista" type="submit" value="Poista">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
