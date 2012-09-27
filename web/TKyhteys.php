<?php
//Tietokantayteyden muodostus ja toiminnan varmistus, sekä virhekäsittely.
try {
    $TKyhteys = new PDO("mysql:host=localhost;port=3306;dbname=tsoha;unix_socket=/home/juhainki/mysql/socket;", "tsohaUser", "pw");
   /* $kysely = $TKyhteys->prepare("SELECT * FROM ruoka");
    $kysely->execute();
    $tulos = $kysely->fetch();
    echo htmlspecialchars($tulos["ID"]);
    echo htmlspecialchars($tulos["nimi"]);
    echo htmlspecialchars($tulos["aika"]);
    echo htmlspecialchars($tulos["ohje"]);*/
} catch (PDOException $e) {
    die("Virhe tietokantayhteydessä: " . $e->getMessage());
}
?>