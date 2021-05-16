<?php

    require_once ('_session.php');

    $identificador = $_GET['idManual'];

    if (!isset($identificador)) {
        header("location: ./index.php?error=noSePasoIdentificador");
    }

    require_once('conexionBD.php');

    $stmt = $conn->prepare("DELETE FROM pokemons WHERE id_manual = ?");
    $stmt->bind_param("i", $identificador);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        $stmt->close();
        header("location: ./index.php?error=identificadorNoExiste");
    } else {
        $stmt->close();
        header("location: ./index.php?ok=eliminadoOk");
    }

