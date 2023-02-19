<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $titulo; ?></h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper mb-5">
            <div class="form-layout form-layout-1">
                <form action="<?php echo base_url() ?>/historiaclinica/registrarDatos" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">

                        <h4 class="col-12 tx-gray-800 border-top-secondary mb-3">Datos del Paciente</h4>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Ingrese los Apellidos">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">DNI: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="dni" id="dni" placeholder="Ingrese el dni">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Dirección: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese la dirección">
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Edad: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="edad" id="edad" placeholder="Ingrese la edad">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Fecha de Nacimiento: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="fecha" id="fecha">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Distrito: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="distrito" id="distrito" placeholder="Ingrese el distrito">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Provincia: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="provincia" id="provincia" placeholder="Ingrese la provincia">
                            </div>
                        </div>

                        <h4 class="col-12 tx-gray-800 border-top-secondary mt-3 mb-3" style="border-top: 2px solid #727B84; padding-top: 15px;">Datos del Familiar</h4>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Parentezco: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="parentezco" id="parentezco" placeholder="Ingrese el parentezco">
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Ingrese el número de telefono">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">DNI del pariente: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="dniPariente" id="dniPariente" placeholder="Ingrese el número de DNI">
                            </div>
                        </div>


                        <h4 class="col-12 tx-gray-800 border-top-secondary mt-3 mb-3" style="border-top: 2px solid #727B84; padding-top: 15px;">Datos del Médico</h4>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nombreMedico" id="nombreMedico" placeholder="Ingrese el nombre del médico">
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Especialidad: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="especialidad" name="especialidad" placeholder="Ingrese el número de especialidad">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Motivo: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="motivo" id="motivo" placeholder="Ingrese el motivo">
                            </div>
                        </div>


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <input type="submit" value="Guardar" class="btn btn-info" name="btnEnviar">
                        <a href="<?php echo base_url() ?>/usuarios" class="btn btn-secondary">Cancelar</a>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>