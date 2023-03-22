<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5">
        <?php

        use CodeIgniter\HTTP\Response;

        echo $titulo;
        ?>
    </h4>
</div>

<div class="br-pagebody mb-5">
    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <div class="d-flex justify-content-center mb-5">
                <form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal">
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-1 control-label">Desde:</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio : ''; ?>">
                        </div>
                        <label for="" class="col-md-1 control-label">Hasta:</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="fechafin" value="<?php echo !empty($fechafin) ? $fechafin : ''; ?>">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                            <a href="<?php echo base_url(); ?>/caja" class="btn btn-danger">Restablecer</a>
                        </div>
                    </div>
                </form>
            </div>

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-5 d-flex justify-content-between">
                Ventas Registradas
                <a href="<?php echo base_url() ?>/caja/registrar"><button class="btn btn-primary" type="button" style="cursor: pointer;"><i class="icon ion-plus"></i> Nueva Venta</button></a>
            </h6>
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="m-auto table-responsive overflow-x-scroll p-3">
                        <table id="datatable2" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center wd-5p">Opciones</th>
                                    <th class="text-center wd-3p">N°</th>
                                    <th class="text-center wd-40p">Nombre Completo</th>
                                    <th class="text-center wd-20p">Descripción</th>
                                    <th class="text-center wd-20p">Gestión</th>
                                    <th class="text-center wd-20p">Referido</th>
                                    <th class="text-center wd-20p">Fecha</th>
                                    <th class="text-center wd-20p">Ingreso</th>
                                    <th class="text-center wd-20p">Egreso 1</th>
                                    <th class="text-center wd-20p">Egreso 2</th>
                                    <th class="text-center wd-20p">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 0;
                                foreach ($caja as $row) : $cont++; ?>
                                    <tr>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="<?php echo base_url() ?>/caja/verRegistro/<?php echo $row["idCaja"]; ?>" class="btn btn-primary btn-sm ml-1"><i class="icon ion-edit"></i></a>
                                            <!-- <a href=#" class="btn btn-info btn-sm ml-1"><i class="icon ion-eye"></i></a> -->
                                        </td>
                                        <td class="text-center">
                                            <?php echo $cont ?></php>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["nombre"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["comentario"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["gestion"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["referido"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["fecha_creacion"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["ingreso"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["egreso_one"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["egreso_two"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["total"]; ?>
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
</script>