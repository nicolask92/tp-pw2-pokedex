<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <form class="user" action="cargarPokemon.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="number" class="form-control form-control-user"
                                                   placeholder="Nro identificador">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control form-control-user"
                                                   placeholder="Descripcion">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select style="height: auto; padding: 14px" class="form-control form-control-user">
                                                <option selected disabled>Seleccione Tipo</option>
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
                                            <button type="submit" class="btn btn-primary mb-2">Cargar</button>
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
