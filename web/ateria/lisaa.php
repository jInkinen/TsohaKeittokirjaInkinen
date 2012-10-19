<!-- 
    Document   : lisää ateria
    Created on : 14.9.2012, 16:13:41
    Author     : juhainki
-->
<?php
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
        <title>Keittokirja Online - Ateria - Lisää</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Lisää uusi ateriakokonaisuus</h1>
                <form id="uusiresepti" action="lisays.php" method="post">
                    <table>
                        <tr>
                            <td>Aterian nimi:</td>			
                            <td><input name="nimi" type="text" required="true"></td>
                        </tr>
                        <tr>
                            <td>Aterian kuvaus:</td>
                            <td><input name="kuvaus" type="text"></td>
                        </tr>
                    </table><br>
                    <input id="lisaa" type="submit" value="Lisää">
                </form>
            </div>
        </div>
    </body>
</html>
