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

if (!isset($_POST["maara"])) {
    $maara = 0;
} else {
    $maara = $_POST["maara"];
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
    <script language="javascript">
        function testi() {
            alert("testi");
        }
        function lisaaUusiAines(lomake) {
            lisaaUusiKentta(lomake, "aines[]");
            lisaaUusiKentta(lomake, "maara[]");
            lisaaUusiKentta(lomake, "yksikko[]");
        }
        function lisaaUusiKentta(lomake, nimi) {
            var kentta = document.createElement("input");

            kentta.setAttribute("type", "text");
            kentta.setAttribute("name", nimi);
            kentta.setAttribute("value", "");
            kentta.setAttribute("size", "15");

            lomake.parentNode.appendChild(kentta);
        }
    </script>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Lisää uusi resepti</h1>
                <form id="lisaaForm" action="lisays.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Reseptin nimi:</td>
                            <td><input name="nimi" type="text"></td>
                        </tr>
                        <tr>
                            <td>Valmistusaika</td>
                            <td><input name="aika" type="number" min="0" value="0"> minuuttia</td>
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
                                Ainekset:
                            </td>
                            <td>
                                <button type="button" onclick="lisaaUusiAines(this)">Uusi aines</button><br>
                            </td>
                        </tr>
			<tr>
                                <td>Kuva:</td>
                                <td><input name="kuva" accept="image/jpeg" type="file"></td>
                        </tr>
                    </table><br>
                    <input id="lisaa" type="submit" value="Lähetä">
                </form>
            </div>
        </div>
    </body>
</html>
