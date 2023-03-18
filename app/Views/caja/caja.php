<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5">
        <?php

        use CodeIgniter\HTTP\Response;

        echo $titulo;
        ?>
    </h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-5 d-flex justify-content-between">
                Historias Clínicas Registradas
                <a href="<?php echo base_url() ?>/caja/registrar"><button class="btn btn-primary" type="button" style="cursor: pointer;"><i class="icon ion-plus"></i> Nueva Venta</button></a>
            </h6>
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="m-auto table-responsive overflow-x-scroll p-3">
                        <table id="datatable1" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center wd-5p">Opciones</th>
                                    <th class="text-center wd-3p">N°</th>
                                    <th class="text-center wd-20p">Nombre Completo</th>
                                    <th class="text-center wd-20p">Médico</th>
                                    <th class="text-center wd-20p">Descripción</th>
                                    <th class="text-center wd-20p">Gestión</th>
                                    <th class="text-center wd-20p">Referio</th>
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
                                        <td class="d-flex">
                                            <a href="<?php echo base_url() ?>/caja/verRegistro/<?php echo $row["idCaja"]; ?>" class="btn btn-primary btn-sm ml-1"><i class="icon ion-edit"></i></a>
                                            <a href=#" class="btn btn-info btn-sm ml-1"><i class="icon ion-eye"></i></a>
                                            <a href="#" class="btn btn-success btn-sm ml-1" target="_blank"><i class="fa-sharp fa-regular fa-file-pdf"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $cont ?></php>
                                        </td>
                                        <td class="text-center">
                                            <?php  echo $row["nombrePaciente"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["nombreMedico"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["motivo"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["gestion"]; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row["referido"]; ?>
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