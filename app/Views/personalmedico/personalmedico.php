<div class="pd-t-30 pd-l-60">
  <h4 class="tx-gray-800 mg-b-5">
    <?php

    use CodeIgniter\HTTP\Response;

    echo $titulo; ?>
  </h4>
</div>

<div class="br-pagebody mg-t-5 pd-x-30">
  <div class="br-pagebody">
    <div class="br-section-wrapper text-center">
      <h6 id="h6_personalmedico" class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-5 d-flex justify-content-between">
        Tipo Personal Registrados
        <a href="<?php echo base_url() ?>/PersonalMedico/registrar"><button id="btn_personalmedico" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" type="button"> Nuevo Tipo Personal</button></a>
      </h6>

      <div class="table-responsive overflow-x-scroll">
        <table id="datatable1" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th class="text-center">Opciones</th>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Apellidos</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Celular</th>
              <th class="text-center">Genero</th>
              <th class="text-center">Fecha Nac.</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Especialidad</th>
              <th class="text-center">Nombre Documento</th>
              <th class="text-center">N° Documento</th>

            </tr>
          </thead>
          <tbody>
            <?php $cont = 0;
            foreach ($personal as $row) : $cont++; ?>
              <tr>
                <td class="text-center">
                  <a href="<?php echo base_url() ?>/personalmedico/VerRegistro/<?php echo $row["idPersonal"]; ?>"><button class="btn btn-primary btn-sm ml-1" title="Editar"><i class="icon ion-edit"></i></button></a>
                 <?php 
                    if(session('rol')==1){
                       echo '<button class="btn btn-danger btn-sm btnDelRol ml-1" id="btnEliminar" onclick="seleccionar('.$row['idPersonal'].')" title="Eliminar"><i class="icon ion-close"></i></button> ';
                    }
                  ?>
                </td>
                <td class="text-center"><?php echo $cont; ?></td>
                <td class="text-center"> <?php echo $row["nombre"]; ?> </td>
                <td class="text-center"> <?php echo $row["apellidos"]; ?> </td>
                <td class="text-center"> <?php echo $row["direccion"]; ?> </td>
                <td class="text-center"> <?php echo $row["celular"]; ?> </td>
                <td class="text-center"> <?php
                                          if ($row["genero"] == 1) {
                                            echo '<span>Masculino</span>';
                                          } else if ($row["genero"] == 2) {
                                            echo '<span>Femenino</span>';
                                          }
                                          ?> </td>
                <td class="text-center"> <?php echo $row["fechaNac"]; ?> </td>
                <td class="text-center"> <?php
                                          if ($row["estado"] == 1) {
                                            echo '<span class="badge badge-success">Activo</span>';
                                          } else if ($row["estado"] == 2) {
                                            echo '<span class="badge badge-danger">Inactivo</span>';
                                          }
                                          ?> </td>
                <td class="text-center"> <?php echo $row["especialidad"]; ?> </td>
                <td class="text-center"> <?php echo $row["NombreDocumento"]; ?> </td>
                <td class="text-center"> <?php echo $row["numeroDocumento"]; ?> </td>

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

  function seleccionar(id) {
    Swal.fire({
      title: 'Eliminar Registro',
      text: "¿Esta seguro de querer eliminar el registro?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si',
      cancelButtonText: 'No',
    }).then((result) => {
      if (result.isConfirmed) {
        eliminar(id);
      }
    })
  }


  function eliminar(id) {
    $.ajax({
      url: '<?php echo base_url() ?>/PersonalMedico/eliminarRegistro/' + id,
      method: 'POST',
      dataType: 'json',
      success: function(response) {
        if (response.statusCode == 200) {
          window.location.href = '<?php echo base_url() ?>/PersonalMedico';
        } else if (response.statusCode == 500) {
          alert('Error inesperado al procesar el formulario');

        }

      },
      error: function(res) {
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
    "resonsieve": "true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order": [
      [0, "desc"]
    ]
  });
</script>