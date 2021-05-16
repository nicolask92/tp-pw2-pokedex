<?php
    session_start();

    $usuario = $_POST['usuario'];
    $contra = $_POST['contraseña'];

    if (!isset($usuario) && !isset($contraseña)) {
        header('location: ./login.php?error=datosIncorrectos');
    }

    require_once('conexionBD.php');

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? and contraseña = ?");
    $stmt->bind_param("ss", $usuario, $contra);
    $stmt->execute();
    $resultados = $stmt->get_result();

    if ($resultados->num_rows > 0) {
        $_SESSION["logueado"] = "$usuario+$contra";
        header('location: ./index.php');
    } else {
        header('location: ./login.php?error=datosIncorrectos');
    }
