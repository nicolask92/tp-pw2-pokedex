<?php require_once('helperDeLogeo.php'); ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th class='text-center'>Identificacion</th>
        <th class='text-center'>Imagen</th>
        <th class='text-center'>Tipo</th>
        <th class='text-center'>Nombre</th>
        <th class='text-center'>Descripcion</th>
        <?php if (mostrarEdicion()) { ?>
            <th class='text-center'>Edicion</th>
            <?php
        }
        ?>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class='text-center'>Identificacion</th>
        <th class='text-center'>Imagen</th>
        <th class='text-center'>Tipo</th>
        <th class='text-center'>Nombre</th>
        <th class='text-center'>Descripcion</th>
        <?php if (mostrarEdicion()) { ?>
            <th class='text-center'>Edicion</th>
            <?php
        }
        ?>
    </tr>
    </tfoot>
    <tbody>
    <?php
        if (!isset($_POST['busqueda']) || $_POST['busqueda'] == '') {
            include_once('_generarListado.php');
        } else {
            include_once('conexionBD.php');

            $stmt = $conn->prepare("SELECT * FROM pokemons WHERE nombre LIKE CONCAT('%',?,'%') OR descripcion LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss", $_POST['busqueda'], $_POST['busqueda']);
            $stmt->execute();
            $resultados = $stmt->get_result();

            if ($resultados->num_rows == 0) {
                echo "<div class='col-lg-12'>";
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Pokemon no encontrado";
                echo "</div>";
                echo "</div>";
                include_once('_generarListado.php');
            } else {
                while ($fila = $resultados->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='text-center align-middle'>" . $fila['id_manual'] . "</td>";
                    echo "<td><div class='card-body'><img style='max-width: 125px!important;' src=." . $fila['imagen'] . " class='img-thumbnail'></div></td>";
                    echo "<td class='text-center align-middle'><img style='width:100px; max-width: 125px!important;' src=." . $fila['tipo'] . " class = 'img-responsive'>";
                    echo "<td class='text-center align-middle'><a href='verDetallesPokemon.php?idManual=${fila['id_manual']}'>" . $fila['nombre'] . "</a></td>";
                    echo "<td class='text-center align-middle'>" . $fila['descripcion'] . "</td>";
                    echo "</tr>";
                }
                $stmt->close();
                $resultados->close();
            }
        }
    ?>
    </tbody>
</table>
