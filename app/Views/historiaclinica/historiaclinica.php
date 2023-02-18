<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php

                                    use CodeIgniter\HTTP\Response;

                                    echo $titulo; ?></h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-5 d-flex justify-content-between">
                Usuarios Registrados
                <a href="<?php echo base_url() ?>/historiaclinica/registrar"><button class="btn btn-primary" type="button"><i class="icon ion-plus"></i> Nuevo Usuario</button></a>
            </h6>
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="m-auto table-responsive overflow-x-scroll p-3">
                        <table id="datatable1" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center wd-5p">Opciones</th>
                                    <th class="text-center wd-3p">N°</th>
                                    <th class="text-center wd-10p">Código</th>
                                    <th class="text-center wd-35p">Nombre Completo</th>
                                    <th class="text-center wd-25p">DNI</th>
                                    <th class="text-center wd-10p">Edad</th>
                                    <th class="text-center wd-15p">Fecha de Nacimiento</th>
                                    <th class="text-center wd-10p">Dirección</th>
                                    <th class="text-center wd-15p">Telefono</th>
                                    <th class="text-center wd-20p">Motivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 0;
                                foreach ($historia as $row) : $cont++; ?>
                                    <tr>
                                        <td class="d-flex">
                                            <a href="#" class="btn btn-primary btn-sm btnEditRol"><i class="icon ion-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm btnDelRol ml-1"><i class="icon ion-close"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $cont ?></php>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["codigohistoria"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["nombres"] . " " . $row["apellidos"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["dni"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["edad"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["fechaNac"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["direccion"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["telefono"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["dni"]; ?>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- table-wrapper -->
                </div><!-- row -->
            </div><!-- form-layout -->
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