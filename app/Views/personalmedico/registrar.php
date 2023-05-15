<div class="pd-t-30 pd-l-30">
    <h4 class="tx-gray-800 mg-b-5">
        Registrar Nuevo Persona Médico
    </h4>
</div>

<div class="br-pagebody pd-x-30 mb-5">
    <div class="br-pagebody">
        <?php error_reporting(0); ?>
        <div class="br-section-wrapper">
            <div class="form-layout form-layout-1">
                <form action="<?php echo base_url() ?>/personalmedico/registrarDatos" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="<?= set_value('nombre') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('nombre') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Ingrese los Apellidos" value="<?= set_value('apellidos') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('apellidos') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Celular: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="celular" name="celular" placeholder="Ingrese la número de celular" value="<?= set_value('celular') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('celular') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Dirección: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Ingrese la dirección" value="<?= set_value('direccion') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('direccion') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listGenero" name="listGenero">
                                    <option label="Seleccione el género"></option>
                                    <option value="1" <?php echo ($_REQUEST["listGenero"] == 1) ? "selected" : "" ?>>Masculino</option>
                                    <option value="2" <?php echo ($_REQUEST["listGenero"] == 2) ? "selected" : "" ?>>Femenino</option>
                                </select>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('listGenero') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Fecha Nacimiento: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" id="edad" name="edad" placeholder="Ingrese la fecha de nacimiento" value="<?= set_value('edad') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('edad') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Documento: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listDocumento" name="listDocumento">
                                    <option label="Seleccione el documento"></option>
                                    <?php foreach ($tipodocumento as $doc) : ?>
                                        <option value="<?php echo $doc["idTipoDocumento"] ?>" <?php echo ($_REQUEST["listDocumento"] == $doc["idTipoDocumento"]) ? "selected" : "" ?>>
                                            <?php echo $doc["NombreDocumento"] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('listDocumento') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Número de documeto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="nroDocumento" name="nroDocumento" placeholder="Ingrese el número de documento" value="<?= set_value('nroDocumento') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('nroDocumento') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Especialidad: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listEspecialidad" name="listEspecialidad">
                                    <option label="Seleccione la Especialidad"></option>
                                    <?php foreach ($tipoespecialidad as $esp) : ?>
                                        <?php if ($esp["estado"] == 1) { ?>
                                            <option value="<?php echo $esp["idTipoEspecialidad"] ?>" <?php echo ($_REQUEST["listEspecialidad"] == $esp["idTipoEspecialidad"]) ? "selected" : "" ?>>
                                                <?php echo $esp["nombre"] ?>
                                            </option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('listEspecialidad') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Tipo Personal: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" id="listTipoPersonal" name="listTipoPersonal">
                                    <option label="Seleccione el Tipo de Personal"></option>
                                    <?php foreach ($tipotrabajador as $tra) : ?>
                                        <option value="<?php echo $tra["idTipoTrabajador"] ?>" <?php echo ($_REQUEST["listTipoPersonal"] == $tra["idTipoTrabajador"]) ? "selected" : "" ?>>
                                            <?php echo $tra["nombreTrabajador"]  ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('listTipoPersonal') : ""; ?>
                                </p>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Estado: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="listStatus" id="listStatus">
                                    <option label="Seleccione el estado"></option>
                                    <option value="1" <?php echo ($_REQUEST["listStatus"] == 1) ? "selected" : "" ?>>Activo</option>
                                    <option value="2" <?php echo ($_REQUEST["listStatus"] == 2) ? "selected" : "" ?>>Inactivo</option>

                                </select>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('listStatus') : ""; ?>
                                </p>
                            </div>
                        </div>

                    </div><!-- row -->

                    <div id="btn_registrarPersonal" class="form-layout-footer">
                        <input type="submit" value="Registrar" class="btn btn-primary" name="btnEnviar">
                        <a href="<?php echo base_url() ?>/PersonalMedico" class="btn btn-secondary">Cancelar</a>
                    </div><!-- form-layout-footer -->
                </form>


            </div><!-- form-layout -->
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>