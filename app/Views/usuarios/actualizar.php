<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5">
        <?php

        use CodeIgniter\HTTP\Response;

        echo $titulo; ?>
    </h4>
</div>



<div class="br-pagebody pd-x-30 mb-5">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="form-layout form-layout-1">
                <form action="<?php echo base_url() ?>/usuarios/actualizarDatos/<?php echo $usuario["idUsuario"] ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <input type="hidden" name="id_" value="<?= $usuario["idUsuario"] ?>">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" value="<?= $usuario["nombre"] ?>">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Ingrese los Apellidos" value="<?= $usuario["apellidos"] ?>">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Ciudad: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="ciudad" id="ciudad" placeholder="Ingrese la ciudad" value="<?= $usuario["ciudad"] ?>">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Dirección: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese la dirección" value="<?= $usuario["direccion"] ?>">
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listGenero" name="listGenero">
                                    <option value="1" <?php echo ($usuario["genero"] == 1) ? "selected" : "" ?>>Masculino</option>
                                    <option value="2" <?php echo ($usuario["genero"] == 2) ? "selected" : "" ?>>Femenino</option>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Celular: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="celular" id="celular" placeholder="Ingrese el número de celular" value="<?= $usuario["celular"] ?>">
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Fecha de nacimiento: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" id="fecha" name="fecha" value="<?= $usuario["fechaNac"] ?>">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre de Usuario: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Ingrese el nombre de usuario" value="<?= $usuario["nameUser"] ?>">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="" name="password" id="password" placeholder="Ingrese la contraseña">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Rol: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listRol" name="listRol">
                                    <option value="1" <?php echo ($usuario["nombreRol"] == 1) ? "selected" : "" ?>>Administrador</option>
                                    <option value="2" <?php echo ($usuario["nombreRol"] == 2) ? "selected" : "" ?>>Trabajador</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Estado: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="listStatus" id="listStatus">
                                    <option value="1" <?php echo ($usuario["estado"] == 1) ? "selected" : "" ?>>Activo</option>
                                    <option value="2" <?php echo ($usuario["estado"] == 2) ? "selected" : "" ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>

                    </div><!-- row -->

                    <div id="btn_registrarUsuario" class="form-layout-footer">
                        <input type="submit" value="Actualizar" class="btn btn-info" name="btnEnviar">
                        <a href="<?php echo base_url() ?>/usuarios" class="btn btn-secondary">Cancelar</a>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>