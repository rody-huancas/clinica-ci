<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $titulo ?></h4>
</div>

<div class="br-pagebody mg-t-5 pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-5 d-flex justify-content-between">
                Especialidades Registradas
                <button class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" type="button" data-toggle="modal" data-target="#modaldemo3"> Nueva Especialidad</button>
            </h6>

            <div class="table-responsive">
                <table id="datatable1" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Opciones</th>
                            <th class="text-center">N°</th>
                            <th class="text-center">Nombre Tipo Personal</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cont = 0;
                        foreach ($tipoespecialidad as $row) : $cont++; ?>
                            <tr>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm ml-1" onclick="verEspecialidad(<?php echo $row['idTipoEspecialidad'] ?>)" title="Editar"><i class="icon ion-edit"></i></button>
                                    <a href="<?php echo base_url() ?>/Especialidad/eliminarRegistro/<?php echo $row["idTipoEspecialidad"]; ?>"><button class="btn btn-danger btn-sm btnDelRol ml-1" title="Eliminar"><i class="icon ion-close"></i></button></a>
                                </td>
                                <td class="text-center"><?php echo $cont; ?></td>
                                <td class="text-center"> <?php echo $row["nombre"]; ?> </td>
                                <td class="text-center"><?php
                                                        if ($row["estado"] == 1) {
                                                            echo '<span class="badge badge-success">Activo</span>';
                                                        } else if ($row["estado"] == 2) {
                                                            echo '<span class="badge badge-danger">Inactivo</span>';
                                                        }
                                                        ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- table-wrapper -->
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>

<div id="modaldemo3" class="modal fade show">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <!-- titulo modal -->
            <div class="modal-header bg-primary pd-y-20 pd-x-100">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold text-white" id="titleModal">
                    Registrar Nueva Especialidad
                </h6>
            </div>
            <!-- fin titulo modal -->

            <!-- contenido modal -->
            <div class="modal-lg pd-25">
                <div class="lh-3 mg-b-20">
                    <div class="tile-body">
                        <form id="formEspecialidad" name="formEspecialidad" method="POST">
                        <input type="hidden" name="id_" id="idEspecialidad" value="" >
                            <div class="form-group">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="especialidad" name="especialidad" placeholder="Ingresar Nombre">
                                <p id="errEspecialidad" style="color:red" class="mt-2 ">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Estado</label>
                                <select class="form-control" id="listStatus" name="listStatus">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                                <p id="errEstado" style="color:red" class="mt-2 ">
                            </div>
                        </form>

                    </div><!-- col-4 -->
                </div>
            </div>

            <!-- botones -->
            <div class="modal-footer">
                <button type="button" id="btnActionForm" class="btn btn-info" onclick="registrarDatos()">Guardar</button>
                <a href=""><button class="btn btn-secondary">Cancelar</button></a>
            </div>
            <!-- fin botones -->
            <!-- fin contenido modal -->
        </div>
    </div>
</div>

<script>

let mensaje = "<?php echo session()->get("mensaje") ?>"
  let texto = "<?php echo session()->get("texto") ?>"

  if (mensaje == "1") {
    Swal.fire({
      icon: 'success',
      title: 'Confirmación',
      text: texto,
    });
  } else if (mensaje == "0") {
    Swal.fire({
      icon: 'error',
      title: 'Alerta',
      text: texto,
    });
  }


    function registrarDatos() {

        $.ajax({
            url: '<?php echo base_url() ?>/Especialidad/registrarDatos',
            method: 'POST',
            dataType: 'json',
            data: $("#formEspecialidad").serialize(),
            success: function(response) {
                console.log(response);
                if (response.statusCode == 200) {
                    window.location.href = '<?php echo base_url() ?>/Especialidad'
                } else if (response.statusCode == 500) {
                    $('#modaldemo3').modal("show");
                    if (response.errors.especialidad) {
                        $('#errEspecialidad').text(response.errors.especialidad);
                    }
                }
            },
            error: function() {
                alert('Error inesperado al procesar el formulario');
            }
        });
    }

    
  function verEspecialidad(id){
      $('#titleModal').text("Actualizar Especialidad");
      $('#btnActionForm').text("Actualizar Datos");
      $.ajax({
      url:'<?php echo base_url() ?>/Especialidad/obtenerEspecialidad/' + id,
      method: 'POST',
      dataType:'json',
      success: function(response) {
          $('#idEspecialidad').val(response.consulta.idTipoEspecialidad);
          $('#especialidad').val(response.consulta.nombre);
          $('#listStatus').val(response.consulta.estado);
          $('#btnActionForm').attr("onclick","actualizarEspecialidadID("+response.consulta.idTipoEspecialidad+")");
          $('#modaldemo3').modal("show");

      },
      error: function(){
        alert('Error inesperado');
      }
    });
  }

  function actualizarEspecialidadID(id){
    $.ajax({
        url:'<?php echo base_url() ?>/Especialidad/actualizarDatos/'+id,
        method: 'POST',
        dataType:'json',
        data: $("#formEspecialidad").serialize(),
        success: function(response) {
        console.log(response);
        if(response.statusCode == 200){
          window.location.href = '<?php echo base_url()?>/Especialidad'
        }else if(response.statusCode == 500){
          $('#modaldemo3').modal("show");
          if (response.errors.especialidad) {
            $('#errEspecialidad').text(response.errors.especialidad);
          }
            
        }
      },
        error: function(){
        alert('Error inesperado al procesar el formulario');
      }
    });
    }


    $('#datatable1').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [
            [0, "desc"]
        ]
    });
</script>