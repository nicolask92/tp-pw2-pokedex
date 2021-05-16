<?php require_once ('_session.php'); ?>
<!doctype html>
<html lang="es">
    <head>
        <?php require_once ('_header.php'); ?>
        <title>Trabajo Practico - Programacion Web 2</title>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include_once ('_admin_sidebar.php'); ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <?php include_once ('_top_bar.php'); ?>
                    <!-- Begin Page Content -->
                    <?php
                        require_once('conexionBD.php');

                        $stmt = $conn->prepare("SELECT * FROM pokemons WHERE id_manual = ?");
                        $stmt->bind_param("s",$_GET['idManual']);
                        $stmt->execute();
                        $resultado = $stmt->get_result();

                        function saberTipoSegunUrl($tipo) {
                            switch ($tipo) {
                                case "/recursos/tipo/fuego.png":
                                    return "fuego";
                                case "/recursos/tipo/tierra.png":
                                    return "tierra";
                                case "/recursos/tipo/viento.png":
                                    return "viento";
                                case "/recursos/tipo/agua.png":
                                    return "agua";
                            }
                        }

                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <div class="container-fluid">
                        <div class="card-group">
                            <div class="card">
                                <img class="card-img-top" src=".<?php echo $fila['imagen'] ?>" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $fila['nombre'] ?></h5>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src=".<?php echo $fila['tipo'] ?>" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tipo</h5>
                                    <p class="card-text">Este pokemon es de tipo <?php echo saberTipoSegunUrl($fila['tipo']) ?>.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Descripcion</h5>
                                    <p class="card-text"><?php echo $fila['descripcion'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        $stmt->close();
                        $resultado->close();
                    ?>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <?php include_once ('_footer.php'); ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <?php
            require_once ('_modal_salir.php');
            require_once ('_scripts.php');
        ?>
    </body>
</html>
