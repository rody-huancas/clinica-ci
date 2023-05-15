<div class="pd-t-30 pd-l-60">
  <h4 class="tx-gray-800 mg-b-5">
    <?php

    use CodeIgniter\HTTP\Response;

    echo $titulo; ?>
  </h4>
</div>



<div class="br-pagebody mg-t-5 pd-x-30 mb-5">
  <div class="br-pagebody">
    <div class="br-section-wrapper text-center">
      <h6 id="h6_tipopersonal" class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-5 d-flex justify-content-between">
        Tipo Personal Registrados
        <button id="btn_tipopersonal" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" type="button" data-toggle="modal" data-target="#modaldemo3"> Nuevo Tipo Personal</button>
      </h6>

      <div class="table-responsive">
        <table id="datatable1" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th class="text-center">Opciones</th>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre Tipo Personal</th>
            </tr>
          </thead>
          <tbody>
            <?php $cont = 0;
            foreach ($tipotrabajador as $row) : $cont++; ?>
              <tr>
                <td class="text-center">
                  <button class="btn btn-primary btn-sm ml-1" onclick="verTipoPersonal(<?php echo $row['idTipoTrabajador'] ?>)" title="Editar"><i class="icon ion-edit"></i></button>
                  <a href="<?php echo base_url() ?>/TipoPersonal/eliminarRegistro/<?php echo $row["idTipoTrabajador"]; ?>"><button class="btn btn-danger btn-sm btnDelRol ml-1" title="Eliminar"><i class="icon ion-close"></i></button></a>
                </td>
                <td class="text-center"><?php echo $cont; ?></td>
                <td class="text-center"> <?php echo $row["nombreTrabajador"]; ?> </td>
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



<!-- Modal -->
<div id="modaldemo3" class="modal fade show">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <!-- titulo modal -->
      <div class="modal-header bg-primary pd-y-20 pd-x-100 ">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold text-white" id="titleModal">
          Registrar Nuevo Tipo Personal
        </h6>
      </div>
      <!-- fin titulo modal -->

      <!-- contenido modal -->
      <div class="modal-lg pd-25">
        <div class="lh-3 mg-b-20">
          <div class="tile-body">
            <form id="formTipoPersonal" name="formTipoPersonal" method="POST">
              <input type="hidden" name="id_" id="idTipoPersonal" value="">
              <div class="form-group">
                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" id="tipoPersonal" name="tipoPersonal" placeholder="Ingresar Nombre">
                <p id="errTipoPersonal" style="color:red" class="mt-2 ">
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
      url: '<?php echo base_url() ?>/TipoPersonal/registrarDatos',
      method: 'POST',
      dataType: 'json',
      data: $("#formTipoPersonal").serialize(),
      success: function(response) {
        console.log(response);
        if (response.statusCode == 200) {
          window.location.href = '<?php echo base_url() ?>/TipoPersonal'
        } else if (response.statusCode == 500) {
          $('#modaldemo3').modal("show");
          if (response.errors.tipoPersonal) {
            $('#errTipoPersonal').text(response.errors.tipoPersonal);
          }
        }
      },
      error: function() {
        alert('Error inesperado al procesar el formulario');
      }
    });
  }

  function verTipoPersonal(id) {
    $('#titleModal').text("Actualizar Tipo Personal");
    $('#btnActionForm').text("Actualizar Datos");
    $.ajax({
      url: '<?php echo base_url() ?>/TipoPersonal/obtenerTipoPersonal/' + id,
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        $('#idTipoPersonal').val(response.consulta.idTipoTrabajador);
        $('#tipoPersonal').val(response.consulta.nombreTrabajador);
        $('#btnActionForm').attr("onclick", "actualizarTipoPersonalID(" + response.consulta.idTipoTrabajador + ")");
        $('#modaldemo3').modal("show");

      },
      error: function() {
        alert('Error inesperado');
      }
    });
  }

  function actualizarTipoPersonalID(id) {
    $.ajax({
      url: '<?php echo base_url() ?>/TipoPersonal/actualizarDatos/' + id,
      method: 'POST',
      dataType: 'json',
      data: $("#formTipoPersonal").serialize(),
      success: function(response) {
        console.log(response);
        if (response.statusCode == 200) {

          window.location.href = '<?php echo base_url() ?>/TipoPersonal'
        } else if (response.statusCode == 500) {
          if (response.errors.tipoPersonal) {
            $('#errTipoPersonal').text(response.errors.tipoPersonal);
          }

        }
      },
      error: function() {
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