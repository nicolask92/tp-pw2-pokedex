<?php

    $conn = new mysqli("127.0.0.1", "root", "user", "pokedex","3309");

    if ($conn->connect_error) {
        die("Error !!!! " . $conn->connect_error);
    }
