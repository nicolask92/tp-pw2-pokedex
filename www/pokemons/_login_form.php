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
                                    if (isset($_GET['error'])) {
                                        echo "<div class='col-lg-12'>";
                                        echo "<div class='alert alert-danger' role='alert'>";
                                        echo "Datos de ingreso incorrectos.";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                ?>
                                <form class="user" action="ingresar.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user" name="usuario"
                                                   placeholder="Nombre de usuario">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control form-control-user" name="contraseña"
                                                   placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-primary mb-2">Ingresar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
