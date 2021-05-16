<?php
    $target_dir = "./recursos/pokemones-cargados";
    $archivo = $_FILES["imagen"]["name"];
    $ext = pathinfo($archivo, PATHINFO_EXTENSION);
    $nombreArchivo = (new DateTime())->getTimestamp();
    $target_file = $target_dir . "/" . $nombreArchivo . "." . $ext;

    copiarArchivoSubidoDeCarpetaTemporalADestino($target_file);

    // header("location: ./ejercicio1.php");

    function copiarArchivoSubidoDeCarpetaTemporalADestino($destination) {
        return move_uploaded_file($_FILES["imagen"]["tmp_name"], $destination);
    }
