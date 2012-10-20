<?php

//Tietokantayteyden muodostus ja toiminnan varmistus, sekä virhekäsittely.
try {
    $TKyhteys = new PDO("mysql:host=localhost;port=3306;dbname=tsoha;unix_socket=/home/juhainki/mysql/socket;", "tsohaUser", "pw");
} catch (PDOException $e) {
    die("Virhe tietokantayhteydessä: " . $e->getMessage());
}
?>
