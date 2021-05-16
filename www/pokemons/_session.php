<?php
    session_start();

    if (!isset($_SESSION['logueado'])) {
        if (
            $_SERVER['PHP_SELF'] == "/tp-pw2-pokedex/www/pokemons/index.php" ||
            $_SERVER['PHP_SELF'] == "/tp-pw2-pokedex/www/pokemons/buscarPokemon.php" ||
            $_SERVER['PHP_SELF'] == "/tp-pw2-pokedex/www/pokemons/verDetallesPokemon.php") {
        } else if (($_SERVER['PHP_SELF'] != "/tp-pw2-pokedex/www/pokemons/login.php")) {
            header("location: login.php");
        }
    }
