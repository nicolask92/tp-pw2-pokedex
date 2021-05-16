<?php

require_once ('_session.php');

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$identificador = $_POST['identificador'];
$identificador_nuevo = $_POST['identificador_nuevo'];
$archivo = $_FILES["imagen"]["name"];

if (!isset($nombre) || !isset($tipo) || !isset($descripcion) || !isset($identificador) || empty($archivo)) {
    header("location: ./editar.php?error=errorEditando&idManual=$identificador");
} else {
    require_once('conexionBD.php');

    $stmt = $conn->prepare("SELECT * FROM pokemons WHERE id_manual = ?");
    $stmt->bind_param("i", $identificador_nuevo);
    $stmt->execute();
    $resultados = $stmt->get_result();

    if (($resultados->num_rows) > 0) {
        $stmt->close();
        $resultados->close();
        header("location: ./editar.php?error=identificadorEnUso&idManual=$identificador");
    } else {

        $target_dir = "/recursos/pokemones-cargados";
        $ext = pathinfo($archivo, PATHINFO_EXTENSION);
        $timestamp = (new DateTime())->getTimestamp();
        $nombreArchivo = strval($timestamp);
        $target_file = $target_dir . "/" . $nombreArchivo . "." . $ext;

        function copiarArchivoSubidoDeCarpetaTemporalADestino($destination) {
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

        $stmt = $conn->prepare("UPDATE pokemons SET id_manual = ?, imagen = ?, tipo = ?, nombre = ?, descripcion = ? WHERE id_manual = ?");
        $stmt->bind_param("issssi", $identificador_nuevo, $target_file, insertarUrlTipo($tipo), $nombre, $descripcion, $identificador);
        $stmt->execute();
        $stmt->close();

        header("location: ./index.php?ok=edicionCorrecta");
    }
}
