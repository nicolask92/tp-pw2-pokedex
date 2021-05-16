<?php
    session_start();

    if (!isset($_SESSION['logeado'])) {
        if ($_SERVER['PHP_SELF'] != "/pokemons/login.php") header("location: login.php");
    }

    require_once('conexionBD.php');

?>
