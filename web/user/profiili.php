<!-- 
    Document   : profiili
    Created on : 14.9.2012, 19:21:16
    Author     : juhainki
-->

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Profiili</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Profiili - [TIETOKANNASTA NIMI]</h1>
                <p>Tämä on käyttäjäprofiilisi. Täältä voit poistaa profiilin tai kirjautua ulos.</p>
                <form>
                    <input id="kirjauduulos" type="button" value="Kirjaudu ulos">
                </form><br><br>
                <form>
                    <input id="poistak" type="button" value="Poista käyttäjätunnus">
                </form>
            </div>
        </div>
    </body>
</html>
