<?php require_once('helperDeLogeo.php'); ?>

<?php
if (isset($_GET["error"])) {
    echo "<div class='col-lg-12'>";
    echo "<div class='alert alert-danger' role='alert'>";
    if ($_GET["error"] == "errorAlEditar") {
        echo "error al querer editar.";
    } else if($_GET['error'] == "identificadorNoExiste"){
        echo "Identificador no existe.";
    }
    echo "</div>";
    echo "</div>";
}

if (isset($_GET["ok"])) {
    echo "<div class='col-lg-12'>";
    echo "<div class='alert alert-warning' role='alert'>";
    if($_GET["ok"] == "eliminadoOk") {
        echo "Pokemon eliminado correctamente!";
    } else if ($_GET["ok"] == "edicionCorrecta") {
        echo "Pokemon editado correctamente!";
    }
    echo "</div>";
    echo "</div>";
}
?>

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
        require_once('_generarListado.php');
    ?>
    </tbody>
</table>

