<!-- 
    Document   : selaa aineksia
    Created on : 13.9.2012, 17:44:36
    Author     : juhainki
-->

<?php
$sort = "";
$sort2 = "";
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
?>

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ainekset</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Ainekset</h1>
                <table>
                    <tr>
                        <th>ID <a href="selaa.php?sort=ID&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=ID&sort2=DESC">&#x25BC</a></th>
                        <th>NIMI <a href="selaa.php?sort=nimi&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=nimi&sort2=DESC">&#x25BC</a></th>
                        <th>HINTA <a href="selaa.php?sort=hinta&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=hinta&sort2=DESC">&#x25BC</a></th>
                        <th>RAVINTO <a href="selaa.php?sort=ravinto&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=ravinto&sort2=DESC">&#x25BC</a></th>
                    </tr>
                    <?php
		    include("../TKyhteys.php"); 
                    include("../taulukko.php");
                   teeTaulukko("aines", $sort, $sort2, "%", $TKyhteys);
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>
