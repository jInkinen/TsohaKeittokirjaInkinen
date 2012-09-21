<!-- 
    Document   : aines
    Created on : 13.9.2012, 17:44:36
    Author     : juhainki
-->

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ainessivu</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
        <?php include("../valikko.php"); ?>
        <div id="raami">
            <div id="menu">
                <ul>
                    <li>
                        <h2>Etusivu</h2>
                        <ul>
                            <li><a href="index.html">Etusivu</a></li>
                        </ul>
                    </li>
                    <li>
                        <h2>Reseptit</h2>
                        <ul>
                            <li><a href="selaares.html">Selaa reseptejä</a></li>
                            <li><a href="#">Lisää reseptejä</a></li>
                        </ul>
                    </li>
                    <li>
                        <h2>Ateriat</h2>
                        <ul>
                            <li><a href="#">Selaa aterioita</a></li>
                            <li><a href="#">Lisää aterioita</a></li>
                        </ul>
                    </li>
                    <li>
                        <h2>Ainekset</h2>
                        <ul>
                            <li><a href="#">Selaa aineksia</a></li>
                            <li><a href="#">Lisää aineksia</a></li>
                        </ul>
                    </li>
                    <li>
                        <h2>Käyttäjä</h2>
                        <ul>
                            <li><a href="#">Ostoskori</a></li>
                            <li><a href="#">Rekisteröidy</a></li>
                            <li><a href="#">Kirjaudu sisään</a></li>				
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="sisus">
                <h1>[AINEKSEN NIMI]</h1>
                <form id="aines" action="">
                    <table>
                        <tr>
                            <td>Vanha hinta</td>
                            <td>[TIETOKANNASTA]</td>
                        </tr>
                        <tr>
                            <td>Uusi hinta</td> 
                            <td><input id="nimi" type="text" value="[TIKA]"> €/kpl</td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <td>Ravintoarvo</td>
                            <td>[TIETOKANNASTA]</td>
                        </tr>
                        <tr>
                            <td>Uusi ravintoarvo</td> 
                            <td><input id="nimi" type="text" value="[TIKA]"> €/kpl</td>
                        </tr>
                    </table>
                    <br><br>
                    <input id="tallenna" type="submit" value="Tallenna">
                </form>
            </div>
        </div>
    </body>
</html>
