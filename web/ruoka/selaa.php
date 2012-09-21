<!-- 
    Document   : selaa reseptejä
    Created on : 13.9.2012, 17:44:36
    Author     : juhainki
-->

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Reseptit</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Reseptit</h1>
                <table>
                    <tr>
                        <th>ID <a href="selaa.php?sort=ID&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=ID&sort2=DESC">&#x25BC</a></th>
                        <th>NIMI <a href="selaa.php?sort=nimi&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=nimi&sort2=DESC">&#x25BC</a></th>
                        <th>AIKA <a href="selaa.php?sort=aika&sort2=ASC">&#x25B2</a> <a href="selaa.php?sort=aika&sort2=DESC">&#x25BC</a></th>
                    </tr>
                    
                    <?php
                    //asetetaan taulukon oletusjärjestys
                    $order = "ID";
                    //Tutkitaan haluaako käyttäjä järjestää taulukon eri tavalla
                    if (isset($_GET["sort"])) {
                        $sort = $_GET["sort"];
                        if ($sort == "nimi" || $sort == "aika") {
                            $order = $sort;
                        }
                        //else: jää oletukseksi
                    } //else: jää oletukseksi
                    
                    $ad = "ASC";
                    if (isset($_GET["sort2"])) {
                        $sort2 = $_GET["sort2"];
                        if ($sort2 == "DESC") {
                            $ad = $sort2;
                        }
                        //else: jää oletukseksi
                    } //else: jää oletukseksi

                    //Luodaan TIKA-yhteys
                    include("../TKyhteys.php");
                    //Valmistellaan kysely


                    $kysely = $TKyhteys->prepare("SELECT * FROM ruoka ORDER BY " . $order . " " . $ad);
                    $kysely->execute();
                    //Luodaan uusi rivi jokaista tulosriviä kohden
                    $i = 0;
                    while ($tulos = $kysely->fetch()) {
                        $i++;
                        if ($i % 2 != 0) {
                            echo "<tr class=alt>";
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>" . $tulos["ID"] . "</td>";
                        echo "<td><a href=resepti.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
                        echo "<td>" . $tulos["aika"] . "</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
