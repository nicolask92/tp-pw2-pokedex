<?php
require_once('conexionBD.php');
require_once('helperDeLogeo.php');

$stmt = $conn->prepare("SELECT * FROM pokemons");
$stmt->execute();
$resultados = $stmt->get_result();


while ($fila = $resultados->fetch_assoc()) {
    echo "<tr>";
    echo "<td class='text-center align-middle'>" . $fila['id_manual'] . "</td>";
    echo "<td><div class='card-body'><img style='max-width: 125px!important;' src=." . $fila['imagen'] . " class='img-thumbnail'></div></td>";
    echo "<td class='text-center align-middle'><img style='max-width: 70px!important;' src=." . $fila['tipo'] . " class = 'img-responsive'>";
    echo "<td class='text-center align-middle'><a href='verDetallesPokemon.php?idManual=${fila['id_manual']}'>" . $fila['nombre'] . "</a></td>";
    echo "<td class='text-center align-middle'>" . $fila['descripcion'] . "</td>";
    if (mostrarEdicion()) {
        echo "<td>";
        echo "<a href='editar.php?idManual={$fila['id_manual']}'>" . "Editar" . "</a>";
        echo "<br>";
        echo "<a href='eliminar.php?idManual={$fila['id_manual']}'>" . "Eliminar" . "</a>";
        echo "</td>";
    }
    echo "</tr>";
}
$stmt->close();
$resultados->close();
