<!-- 
    Document   : rekisteröidy
    Created on : 14.9.2012, 19:35:24
    Author     : juhainki
-->

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Rekisteröidy</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="sisus">
                <h1>Luo uusi käyttäjätunnus / Kirjaudu sisään</h1>
                <form id="rekisteroidy">
                    Tunnus: <input id="nimi" type="text"><br>
                    Salasana: <input id="ss" type="password"><br>
                    <input id="luo" type="button" value="Luo/kirjaudu">
                </form>
            </div>
        </div>
    </body>
</html>
