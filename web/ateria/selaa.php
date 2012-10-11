<!-- 
    Document   : selaa aterioita
    Created on : 13.9.2012, 17:44:36
    Author     : juhainki
-->

<?php
// Asetetaan haluttu järjestys taulukon tulostamista varten.
if (!isset($_GET["sort"])) {
    $sort = "ID";
} else {
    $sort = $_GET["sort"];
}

if (!isset($_GET["sort2"])) {
    $sort2 = "ASC";
} else {
    $sort2 = $_GET["sort2"];
}

$taulu = "ateria";
?>

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ateriat</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Ateriat</h1>
                <table>
                    <tr>
                        <th>ID <a href="selaa.php?sort=ID&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=ID&sort2=DESC">&#x25BC</a></th>
                        <th>NIMI <a href="selaa.php?sort=nimi&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=nimi&sort2=DESC">&#x25BC</a></th>
                    </tr>
                    <?php
                    // Tulostetaan taulukko
                    include("../taulukko.php");
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>
