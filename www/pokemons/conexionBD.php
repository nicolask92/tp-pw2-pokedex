<?php

    $conn = new mysqli("localhost", "root", "", "pokedex","3307");

    if ($conn->connect_error) {
        die("Error !!!! " . $conn->connect_error);
    }
