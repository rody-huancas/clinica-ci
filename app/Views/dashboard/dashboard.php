<div class="pd-30">
  <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
</div>
<!-- d-flex -->

<div class="br-pagebody mg-t-5 pd-x-30">
  <div class="row row-sm">
    <div class="col-sm-6 col-xl-3">
      <div class="bg-teal rounded overflow-hidden">
        <div class="pd-25 d-flex align-items-center">
          <i class="ion ion-android-contact tx-68 lh-0 tx-white op-7"></i>
          <div class="mg-l-20">
            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
              Usuarios Registrados
            </p>
            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">
              <?php echo $cant_usuarios; ?>
            </p>
            <span class="tx-11 tx-roboto tx-white-6"></span>
          </div>
        </div>
      </div>
    </div>
    <!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
      <div class="bg-danger rounded overflow-hidden">
        <div class="pd-25 d-flex align-items-center">
          <i class="icon ion-ios-medkit-outline tx-68 lh-0 tx-white op-7"></i>
          <div class="mg-l-20">
            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
              Personal Medico Registrados
            </p>
            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">
              <?php echo $cant_personal; ?>

            </p>
            <span class="tx-11 tx-roboto tx-white-6"></span>
          </div>
        </div>
      </div>
    </div>
    <!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
      <div class="bg-primary rounded overflow-hidden">
        <div class="pd-25 d-flex align-items-center">
          <i class="ion ion-monitor tx-68 lh-0 tx-white op-7"></i>
          <div class="mg-l-20">
            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
              Ventas Realizadas
            </p>
            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">
              <?php echo $cant_caja; ?>
            </p>
            <span class="tx-11 tx-roboto tx-white-6"></span>
          </div>
        </div>
      </div>
    </div>
    <!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
      <div class="bg-br-primary rounded overflow-hidden">
        <div class="pd-25 d-flex align-items-center">
          <i class="ion ion-clock tx-68 lh-0 tx-white op-7"></i>
          <div class="mg-l-20">
            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
              Historias Clínicas Registradas
            </p>
            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">
              <?php echo $cant_historia; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- col-3 -->
  </div>
  <!-- row -->

  <div class="card bd-0 shadow-base pd-30 mg-t-20">
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="m-auto table-responsive overflow-x-scroll p-3" style="width: 100%;">
          <table id="datatable1" class="table table-hover table-bordered" style="width: 100%;">
            <thead>
              <tr>
                <th class="text-center wd-5p">N°</th>
                <th class="text-center wd-10p">Código</th>
                <th class="text-center wd-25p">Nombre Completo</th>
                <th class="text-center wd-10p">Telefono</th>
                <th class="text-center wd-20p">Dirección</th>
                <th class="text-center wd-20p">Motivo</th>
                <th class="text-center wd-25p">Origen</th>
              </tr>
            </thead>
            <tbody>
              <?php $cont = 0;
              foreach ($historia as $row) : $cont++; ?>
                <tr>
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
                    <?php echo $row["telefonoPaciente"]; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $row["direccion"]; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $row["motivo"]; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $row["origen"]; ?>
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
  <!-- card -->

  <!-- row -->
</div>
<!-- br-pagebody -->