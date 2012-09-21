<!-- 
    Document   : selaa aterioita
    Created on : 13.9.2012, 17:44:36
    Author     : juhainki
-->

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
                        <th>ID</th>
                        <th>Nimi</th>
                    </tr>
                    <?php
                        //Tuodaan TIKA-yhteys
                        include("../TKyhteys.php");
                        //Valmistellaan kysely
                        $kysely = $TKyhteys->prepare("SELECT * FROM ateria");
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
                                echo "<td><a href=ateria.php?id=" . $tulos["ID"] . ">" . $tulos["nimi"] . "</a></td>";
                        }
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>
