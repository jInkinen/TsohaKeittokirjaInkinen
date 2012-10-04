<!-- 
    Document   : aines
    Created on : 13.9.2012, 17:44:36
    Author     : juhainki
-->
<?php session_start(); ?>
<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ainessivu</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <?php
                include("../TKyhteys.php");
                $kysely = $TKyhteys->prepare("SELECT * FROM aines WHERE ID=" . $ID);
                $kysely->execute();
                $tulos = $kysely->fetch();
                $nimi = $tulos["nimi"];
                $hinta = $tulos["hinta"];
                $ravinto = $tulos["ravinto"];
                $yksikko = $tulos["yksikko"];

                echo "<h1>" . $nimi . "<h1>";
                ?>
                <form id="aines" action="muokkaa.php" method="post">
                    <table>
                        <tr>
                            <td>Vanha hinta</td>
                            <td><?php echo $hinta . " €/" . $yksikko; ?></td>
                        </tr>
                        <tr>
                            <td>Uusi hinta</td> 
                            <td><?php echo "<input name=hinta type=text value=" . $hinta . "> €/" . $yksikko ?></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <?php
                        // Jos käyttäjä ei ole rekisteröitynyt, hän ei pääse muokkaamaan tietoja
                        if ($_SESSION["kirjautunut"] != 1) {
                            exit();
                        }
                        echo "<tr><td>Ravintoarvo</td><td>";
                        echo $ravinto . " kcal/" . $yksikko;
                        echo "</td></tr><tr><td>Uusi ravintoarvo</td><td>";
                        echo "<input name=ravinto type=text value=" . $ravinto . "> kcal/" . $yksikko;
                        echo "</td></tr></table><br><br>";
                        echo "<input name=tallenna type=submit value=Tallenna>";
                        ?>
                </form>
            </div>
        </div>
    </body>
</html>
