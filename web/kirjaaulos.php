<?php
unset($_SESSION["kirjautunut"]);
unset($_SESSION["ID"]);
header("Location: index.php");
?>