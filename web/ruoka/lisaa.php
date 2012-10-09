<!-- 
    Document   : lisää resepti
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
        <title>Keittokirja Online - Resepti - Lisää</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Lisää uusi resepti</h1>
                <form id="lisaaForm" action="lisays.php" method="post">
                    <table>
                        <tr>
                            <td>Reseptin nimi:</td>			
                            <td><input name="nimi" type="text"></td>
                        </tr>
                        <tr>
                            <td>Valmistusaika</td>			
                            <td><input name="aika" type="number" min="0"> minuuttia</td>
                        </tr>
                        <tr>
                            <td>Tyyppi: [TODO]</td>
                            <td>
                                <select>
                                    <option value="null">(Ei valittu)</option>
                                    <option value="alku">Alkuruoka</option>
                                    <option value="paa">Pääruoka</option>
                                    <option value="jalki">Jälkiruoka</option>
                                    <option value="juoma">Juoma</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Laji: [TODO]</td>
                            <td>
                                <select>
                                    <option value="null">(Ei valittu)</option>
                                    <option value="liha">Liha</option>
                                    <option value="kala">Kala</option>
                                    <option value="kasvis">Kasvis</option>
                                    <option value="kana">Broileri</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Valmistusohje:</td>			
                            <td><textarea name="ohje" rows=4 cols=50>Lisää ohje</TEXTAREA></td>
			</tr>
                        <tr>
                            <td>
                                Ainesten lukumäärä:
                            </td>
                            <td>
                                <input name="ainekset" type="number" min="0">
                            </td>
                        </tr>
                        <tr>
                                <td>Kuva: [TODO]</td>
                                <td><input id="kuva" type="file"></td>
                        </tr>
                </table><br>
                <input id="lisaa" type="submit" value="Lähetä">
                </form>
            </div>
        </div>
    </body>
</html>