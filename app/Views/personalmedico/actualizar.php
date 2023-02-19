<div class="pd-t-30 pd-l-40">
    <h4 class="tx-gray-800 mg-b-5">
        Actualizar Datos del Personal Médico
    </h4>
</div>


<div class="br-pagebody pd-x-30 mb-5">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="form-layout form-layout-1">
                <form action="<?php echo base_url() ?>/personalmedico/actualizarDatos/<?php echo $personal["idPersonal"] ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_" value="<?= $personal["idPersonal"] ?>">

                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="<?= $personal["nombre"] ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('nombre') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Ingrese los Apellidos" value="<?= $personal["apellidos"] ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('apellidos') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Celular: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="celular" name="celular" placeholder="Ingrese la número de celular" value="<?= $personal["celular"] ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('celular') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Dirección: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Ingrese la dirección" value="<?= $personal["direccion"] ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('direccion') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listGenero" name="listGenero">
                                    <option value="1" <?php echo ($personal["genero"] == 1) ? "selected" : "" ?>>Masculino</option>
                                    <option value="2" <?php echo ($personal["genero"] == 2) ? "selected" : "" ?>>Femenino</option>
                                    <p id="errNom" style="color:red">
                                        <?php echo (isset($validation)) ? $validation->getError('listGenero') : ""; ?>
                                    </p>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Fecha Nacimiento: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" id="edad" name="edad" placeholder="Ingrese la fecha de nacimiento" value="<?= $personal["fechaNac"] ?>">
                                <p id="errNom" style="color:red">
                                </p>
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Documento: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listDocumento" name="listDocumento">
                                    <?php foreach ($tipodocumento as $doc) : ?>
                                        <option <?php echo ($personal["idTipoDocumento"] == $doc['idTipoDocumento']) ? "selected" : "" ?> value="<?php echo $doc["idTipoDocumento"] ?>"><?php echo $doc["NombreDocumento"] ?></option>
                                    <?php endforeach; ?>
                                    <p id="errNom" style="color:red">
                                    </p>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Número de documeto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="nroDocumento" name="nroDocumento" placeholder="Ingrese el número de documento" value="<?= $personal["numeroDocumento"] ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('nroDocumento') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Especialidad: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listEspecialidad" name="listEspecialidad">
                                    <?php foreach ($tipoespecialidad as $esp) : ?>
                                        <?php if ($esp["estado"] == 1) { ?>
                                            <option <?php echo ($personal["idTipoEspecialidad"] == $esp['idTipoEspecialidad']) ? "selected" : "" ?> value="<?php echo $esp["idTipoEspecialidad"] ?>"><?php echo $esp["nombre"] ?></option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                    <p id="errNom" style="color:red">
                                    </p>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Tipo Personal: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listTipoPersonal" name="listTipoPersonal">
                                    <?php foreach ($tipotrabajador as $tra) : ?>
                                        <option <?php echo ($personal["idTipoTrabajador"] == $tra['idTipoTrabajador']) ? "selected" : "" ?> value="<?php echo $tra["idTipoTrabajador"] ?>"><?php echo $tra["nombreTrabajador"] ?></option>
                                    <?php endforeach; ?>
                                    <p id="errNom" style="color:red">
                                    </p>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Estado: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="listStatus" id="listStatus">
                                    <option value="1" <?php echo ($personal["estado"] == 1) ? "selected" : "" ?>>Activo</option>
                                    <option value="2" <?php echo ($personal["estado"] == 2) ? "selected" : "" ?>>Inactivo</option>
                                    <p id="errNom" style="color:red">
                                        <?php echo (isset($validation)) ? $validation->getError('listStatus') : ""; ?>
                                    </p>
                                </select>
                            </div>
                        </div>

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <input type="submit" value="Actualizar" class="btn btn-primary" name="btnEnviar">
                        <a href="<?php echo base_url() ?>/PersonalMedico" class="btn btn-secondary">Cancelar</a>
                    </div><!-- form-layout-footer -->
                </form>


            </div><!-- form-layout -->
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>