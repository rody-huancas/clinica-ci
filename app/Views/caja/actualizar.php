<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $titulo; ?></h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper mb-5">
            <div class="form-layout form-layout-1">
                <form action="<?php echo base_url() ?>/caja/actualizarDatos/<?php echo $caja["idCaja"] ?>" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">

                        <!-- datos paciente -->
                        <h4 class="col-12 tx-gray-800 border-top-secondary mt-3 mb-3">Datos del Paciente</h4>
                        <input type="hidden" name="id_" value="<?= $caja["idCaja"] ?>">

                        <div class="col-lg-12">
                            <a class="btn btn-app btn-info text-white mb-3 w-25" data-toggle="modal" data-target="#modalBusqueda" data-backdrop="static" data-keyboard="false">
                                <i class="fas fa-search"></i>
                                Buscar Paciente
                            </a>
                        </div>

                        <input type="hidden" class="form-control form-control-sm" name="txt_IDHistoria" id="txt_IDPersonal" value="<?= $caja["idhistoria"] ?>">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nombrePaciente" id="nombrePaciente" placeholder="Nombre del paciente" disabled value="<?= $caja["nombrePaciente"] ?>">
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Médico: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="medico" name="medico" placeholder="Nombre de médico" disabled value="<?= $caja["nombreMedico"] ?>">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Descripcion: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" disabled value="<?= $caja["motivo"] ?>">
                            </div>
                        </div>

                        <!-- datos atención -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Referido: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="referido" name="referido" placeholder="Referido" value="<?= $caja["referido"] ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Gestión: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="gestion" name="gestion" placeholder="Gestión" value="<?= $caja["gestion"] ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Comentario: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="comentario" id="comentario" placeholder="Comentario" style="min-height: 80px;"><?= $caja["comentario"] ?></textarea>
                            </div>
                        </div>

                        <!-- datos caja -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Ingreso: <span class="tx-danger">*</span></label>
                                <input class="form-control"  id="ingreso" name="ingreso" placeholder="Ingreso" value="<?= $caja["ingreso"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Egreso 1: <span class="tx-danger">*</span></label>
                                <input class="form-control"  id="egreso_one" name="egreso_one" placeholder="Egreso 1" value="<?= $caja["egreso_one"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Egreso 2: <span class="tx-danger">*</span></label>
                                <input class="form-control"  id="egreso_two" name="egreso_two" placeholder="Egreso 2" value="<?= $caja["egreso_two"] ?>">
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
                $('[name="nombrePaciente"]').val(response.historiaclinica.nombres).prop("disabled", true);
                $('[name="medico"]').val(response.historiaclinica.nombreMedico).prop("disabled", true);
                $('[name="descripcion"]').val(response.historiaclinica.motivo).prop("disabled", true);


            },
            error: function(jqXHR, textStatus, errorThrown) {}
        });
    }
</script>