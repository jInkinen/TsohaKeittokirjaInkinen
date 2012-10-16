<?php
session_start();
unset($_SESSION["kirjautunut"]);
unset($_SESSION["kaytID"]);
header("Location: ../index.php");
?>
