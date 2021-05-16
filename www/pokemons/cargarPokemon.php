<?php

    require_once ('_session.php');

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $identificador = $_POST['identificador'];
    $archivo = $_FILES["imagen"]["name"];

    if (!isset($nombre) || !isset($tipo) || !isset($descripcion) || !isset($identificador) || !isset($_FILES["imagen"]) || empty($_FILES)) {
        header("location: ./nuevo-pokemon.php?error=true");
    } else {
        require_once('conexionBD.php');

        $stmt = $conn->prepare("SELECT * FROM pokemons WHERE id_manual = ?");
        $stmt->bind_param("i", $identificador);
        $stmt->execute();
        $resultados = $stmt->get_result();

        if (($resultados->num_rows) > 0) {
            $stmt->close();
            $resultados->close();
            header("location: ./nuevo-pokemon.php?error=identificadorRepetido");
        }
        $stmt->close();
        $resultados->close();

        $target_dir = "/recursos/pokemones-cargados";
        $ext = pathinfo($archivo, PATHINFO_EXTENSION);
        $timestamp = (new DateTime())->getTimestamp();
        $nombreArchivo = strval($timestamp);
        $target_file = $target_dir . "/" . $nombreArchivo . "." . $ext;

        function copiarArchivoSubidoDeCarpetaTemporalADestino($destination)
        {
            return move_uploaded_file($_FILES["imagen"]["tmp_name"], $destination);
        }

        copiarArchivoSubidoDeCarpetaTemporalADestino("." . $target_file);

        function insertarUrlTipo($tipo) {
            switch ($tipo) {
                case "fuego":
                    return '/recursos/tipo/fuego.png';
                case "tierra":
                    return '/recursos/tipo/tierra.png';
                case "viento":
                    return '/recursos/tipo/viento.png';
                case "agua":
                    return '/recursos/tipo/agua.png';
            }
        }

        $stmt = $conn->prepare("INSERT INTO pokemons(id_manual, imagen, tipo, nombre, descripcion) values (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $identificador, $target_file, insertarUrlTipo($tipo), $nombre, $descripcion);
        $stmt->execute();
        $stmt->close();

        header("location: ./nuevo-pokemon.php?ok=todoOk");
    }
