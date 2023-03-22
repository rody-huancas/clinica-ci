<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $titulo; ?></h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper mb-5">
            <?php error_reporting(0); ?>
            <div class="form-layout form-layout-1">
                <form action="<?php echo base_url() ?>/caja/registrarDatos" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">

                        <!-- datos paciente -->
                        <h4 class="col-12 tx-gray-800 border-top-secondary mt-3 mb-3">Datos del Paciente</h4>

                        <div class="col-lg-12 d-flex justify-content-center align-items-center mb-5">
                            <div class="mr-5">
                                <a class="btn btn-app btn-info text-white" data-toggle="modal" data-target="#modalBusqueda" data-backdrop="static" data-keyboard="false">
                                    <i class="fas fa-search"></i>
                                    Buscar Paciente
                                </a>
                            </div>

                            <div class="">
                                <select name="idselect" id="idselect" class="form-control custom-select text-white" style="background-color: #158fa2;">
                                    <option label="Seleccione si es una persona general"></option>
                                    <?php foreach ($historiaclinica as $his) : ?>
                                        <?php if ($his["idhistoria"] == 1) { ?>

                                            <option value="<?php echo $his["idhistoria"] ?>" <?php echo ($_REQUEST["idselect"] == $his["idhistoria"]) ? "selected" : "" ?>>
                                                <?php echo $his["nombres"] ?>
                                            </option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <input type="hidden" class="form-control form-control-sm" name="txt_IDHistoria" id="txt_IDPersonal">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nombrePaciente" id="nombrePaciente" placeholder="Nombre del paciente" disabled>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('txt_IDHistoria') : ""; ?>
                                </p>
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Médico: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="medico" name="medico" placeholder="Nombre de médico" disabled>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Descripcion: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" disabled>
                            </div>
                        </div>

                        <!-- datos atención -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Referido: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="referido" name="referido" placeholder="Referido" value="<?= set_value('referido') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('referido') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Gestión: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="gestion" name="gestion" placeholder="Gestión" value="<?= set_value('gestion') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('gestion') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Comentario: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="comentario" id="comentario" placeholder="Comentario" style="min-height: 80px;"><?= set_value('comentario') ?></textarea>
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('comentario') : ""; ?>
                                </p>
                            </div>
                        </div>

                        <!-- datos caja -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Ingreso: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" id="ingreso" name="ingreso" placeholder="Ingreso" value="<?= set_value('ingreso') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('ingreso') : ""; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Egreso 1: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" id="egreso_one" name="egreso_one" placeholder="Egreso 1" value="<?= set_value('egreso_one') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('egreso_one') : ""; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Egreso 2: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" id="egreso_two" name="egreso_two" placeholder="Egreso 2" value="<?= set_value('egreso_two') ?>">
                                <p id="errNom" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('egreso_two') : ""; ?>
                                </p>
                            </div>
                        </div>

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <input type="submit" value="Guardar" class="btn btn-primary" name="btnEnviar">
                        <a href="<?php echo base_url() ?>/caja" class="btn btn-secondary">Cancelar</a>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>


<div class="modal form-modal w-100" id="modalBusqueda" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg w-100">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-3">
                    <h4 class="modal-title" id="title" style="font-size: 18px;">Buscar Paciente</h4>
                </div>
                <div class="col-sm-7">
                    <form action='#' id="formBusqueda" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="text" class="form-control form-control-sm" id="txtBusqueda" name="txtBusqueda" placeholder="Ingrese el nombre, apellido o el dni" onkeyup="keyBusqueda(this.value)">
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-12 ">
                        <table class=" table table-bordered bg-light table-sm table-hover table-striped " id="tblBusqueda">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre completo del paciente</th>
                                    <th>Nombre del médico</th>
                                    <th>Motivo</th>
                                    <th>Dni</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $("#idselect").on("change", function() {
        var option = $(this).val();
        // $("#btn-agregar").val(option);
        mostrarPacienteGeneral(option);
    });



    function keyBusqueda(val) {
        if (val != "") {
            $.ajax({
                url: "<?php echo base_url() ?>/caja/keyBusqueda/" + val,
                method: "post",
                dataType: "json",
                success: function(response) {
                    $("#tblBusqueda>tbody").empty();
                    let cont = 0;
                    if (response.historiaclinica) {
                        $.each(response.historiaclinica, function(idx, val) {
                            cont++;
                            $("#tblBusqueda>tbody").append("<tr>\
                                                        <td>" + cont + "</td>\
                                                        <td>" + val.paciente + "</td>\
                                                        <td>" + val.nombre + "</td>\
                                                        <td>" + val.motivo + "</td>\
                                                        <td>" + val.dni + "</td>\
                                                        <td class='text-center'>\
                                                            <button class='btn btn-info btn-xs' onclick='mostrarPacienteID(" + val.idhistoria + ")'>\
                                                            <i class='fas fa-arrow-circle-right'></i>\
                                                            </button>\
                                                        </td>\
                                                        </tr>");
                        });
                    } else {
                        $("#tblBusqueda>tbody").empty();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {}
            });
        }

    }


    function mostrarPacienteID(idhistoria) {
        $.ajax({
            url: "<?php echo base_url() ?>/caja/mostrarPacienteID/" + idhistoria,
            method: "post",
            dataType: "json",
            success: function(response) {
                $("#modalBusqueda").modal("hide");
                //limpiarForm();
                $('[name="txt_IDHistoria"]').val(response.historiaclinica.idhistoria);
                $('[name="nombrePaciente"]').val(response.historiaclinica.nombres).prop("disabled", false);
                $('[name="medico"]').val(response.historiaclinica.nombreMedico).prop("disabled", true);
                $('[name="descripcion"]').val(response.historiaclinica.motivo).prop("disabled", true);


            },
            error: function(jqXHR, textStatus, errorThrown) {}
        });
    }

    function mostrarPacienteGeneral(idhistoria) {
        $.ajax({
            url: "<?php echo base_url() ?>/caja/mostrarPacienteIDgeneral/" + idhistoria,
            method: "post",
            dataType: "json",
            success: function(response) {
                $("#modalBusqueda2").modal("hide");
                //limpiarForm();
                $('[name="txt_IDHistoria"]').val(response.historiaclinica.idhistoria);
                $('[name="nombrePaciente"]').prop("disabled", false);
                $('[name="medico"]').prop("disabled", true);
                $('[name="descripcion"]').prop("disabled", true);


            },
            error: function(jqXHR, textStatus, errorThrown) {}
        });
    }
</script>