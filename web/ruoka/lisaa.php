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
                            <td>Tyyppi:</td>
                            <td>
                                <select name="tyyppi">
                                    <option value="">(Ei valittu)</option>
                                    <option value="Alkuruoka">Alkuruoka</option>
                                    <option value="Pääruoka">Pääruoka</option>
                                    <option value="Jälkiruoka">Jälkiruoka</option>
                                    <option value="Juoma">Juoma</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Laji:</td>
                            <td>
                                <select name="laji">
                                    <option value="">(Ei valittu)</option>
                                    <option value="Liha">Liha</option>
                                    <option value="Kala">Kala</option>
                                    <option value="Kasvis">Kasvis</option>
                                    <option value="Kana">Broileri</option>
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
                                <td>Kuva: [WIP]</td>
                                <td><input name="kuva" accept="image/jpeg" type="file"></td>
                        </tr>
                </table><br>
                <input id="lisaa" type="submit" value="Lähetä">
                </form>
            </div>
        </div>
    </body>
</html>