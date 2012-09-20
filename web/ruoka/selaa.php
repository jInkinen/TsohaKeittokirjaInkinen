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
        <div id="banneri">
            <ul>
                <li>
                    <form id="haku" action="">
                        <input id="etsi" type="text" placeholder="Mitä etsit?">
                        <input id="hae" type="submit" value="Hae">
                    </form>
                </li>
            </ul>
        </div>
        <div>
            <ul id="navi">
                <li><a href="../index.html">Etusivu</a></li>
                <li>
                    <a href="selaa.html">Reseptit</a>
                    <ul>
                        <li><a href="lisaa.html">Lisää uusi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../ateria/selaa.html">Ateriat</a>
                    <ul>
                        <li><a href="../ateria/lisaa.html">Lisää uusi</a></li>
                    </ul>
                </li>
                <li><a href="../aines/selaa.html">Ainekset</a></li>
                <li>
                    <a href="../user/profiili.html">Käyttäjä</a>
                    <ul>
                        <li><a href="../user/kori.html">Ostoskori</a></li>
                        <li><a href="../user/rek.html">Rekisteröidy</a></li>
                        <li><a href="../user/kir.html">Kirjaudu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="raami">
            <div id="sisus">
                <h1>Reseptit</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nimi</th>
                        <th>Valmistusaika</th>
                    </tr>
                    <?php
                        //Tuodaan TIKA-yhteys
                        include("../TKyhteys.php");
                        //Valmistellaan kysely
                        $kysely = $TKyhteys->prepare("SELECT * FROM ruoka");
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
