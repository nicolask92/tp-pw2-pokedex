<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <?php
                                require_once ('conexionBD.php');
                                require_once ('helperDeLogeo.php');

                                $identificador = $_GET['idManual'];

                                $stmt = $conn->prepare("SELECT * FROM pokemons WHERE id_manual = ?");
                                $stmt->bind_param("i", $identificador);
                                $stmt->execute();
                                $resultados = $stmt->get_result();

                                if (isset($_GET["error"])) {
                                    echo "<div class='col-lg-12'>";
                                    echo "<div class='alert alert-danger' role='alert'>";
                                    if ($_GET["error"] == "errorEditando") {
                                        echo "Faltan cargar algun dato.";
                                    } else if($_GET["error"] == "identificadorEnUso"){
                                        echo "Edicion de pokemon con ese id esta en uso.";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                }

                                if (isset($_GET["ok"])) {
                                    echo "<div class='col-lg-12'>";
                                    echo "<div class='alert alert-primary' role='alert'>";
                                    echo "Se edito correctamente el pokemon!";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                ?>

                                <?php
                                    while($fila = $resultados->fetch_assoc()) {
                                ?>
                                <form class="user" action="doEditar.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input name="identificador" value="<?php echo $fila['id_manual'] ?>" hidden>
                                            <input type="number" name="identificador_nuevo" value="<?php echo $fila['id_manual'] ?>" class="form-control form-control-user"
                                                   placeholder="Nro identificador">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="nombre" value="<?php echo $fila['nombre'] ?>" class="form-control form-control-user"
                                                   placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="descripcion" value="<?php echo $fila['descripcion'] ?>" class="form-control form-control-user"
                                                   placeholder="Descripcion">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select style="height: auto; padding: 14px" name="tipo" class="form-control form-control-user">
                                                <option selected value="<?php echo getTipoSegunUrl($fila['tipo']); ?>">Actualmente es <?php echo getTipoSegunUrl($fila['tipo']); ?></option>
                                                <option value="fuego">Fuego</option>
                                                <option value="tierra">Tierra</option>
                                                <option value="agua">Agua</option>
                                                <option value="viento">Viento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="custom-file">
                                                <input type="file" name="imagen" class="custom-file-input" lang="es">
                                                <label class="custom-file-label" for="customFileLang">Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-primary mb-2">Editar</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
