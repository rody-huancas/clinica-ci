<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/public/dist/img/icons8-clínica-48.png">

  <title>Enfoque Salud</title>

  <!-- vendor css -->
  <link href="<?php echo base_url(); ?>/public/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/public/lib/Ionicons/css/ionicons.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/public/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/public/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/public/lib/rickshaw/rickshaw.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>/public/lib/chartist/chartist.css" rel="stylesheet" />

  <!-- estilos css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/style.css?v=<?php echo rand(); ?>" />
  >

  <!-- Bracket CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/dist/css/bracket.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/lib/sweetalert2/sweetalert2.css" />
  <script src="<?php echo base_url(); ?>/public/lib/sweetalert2/sweetalert2.js"></script>


  <script src="<?php echo base_url(); ?>/public/lib/jquery/jquery-1.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/dist/js/DataTables-1.12.1/css/jquery.dataTables.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>/public/dist/js/DataTables-1.12.1/js/jquery.dataTables.js"></script>

  <script src="https://kit.fontawesome.com/0a36c73c11.js" crossorigin="anonymous"></script>


</head>

<body>
  <!-- INICIO MENÚ LATERAL -->
  <!-- Logo -->
  <div class="br-logo m-auto">
    <a href="<?php echo base_url(); ?>/inicio"><span>[</span>Enfoque Salud<span>]</span></a>
  </div>
  <!-- fin logo -->

  <!-- menú -->
  <div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
      <a href="<?php echo base_url(); ?>/inicio" class="br-menu-link active">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Inicio</span>
        </div>
      </a>

      <a href="#" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-person tx-24"></i>
          <span class="menu-item-label">Usuarios</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
        <!-- menu-item -->
      </a>
      <!-- br-menu-link -->
      <ul class="br-menu-sub nav flex-column">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/usuarios" class="nav-link">Listar Usuarios</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/pacientes" class="nav-link">Listar Pacientes</a>
        </li>

      </ul>

      <a href="#" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-medkit-outline tx-24"></i>
          <span class="menu-item-label">Personal Medico</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
        <!-- menu-item -->
      </a>

      <ul class="br-menu-sub nav flex-column">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/personalmedico" class="nav-link">Listar Personal Medico</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/tipopersonal" class="nav-link">Listar Tipo Personal</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/especialidad" class="nav-link">Listar Especialidad</a>
        </li>
      </ul>
      <!-- br-menu-link -->
      <a href="#" class="br-menu-link">
        <div class="br-menu-item">
          <i class="fa-solid fa-house-medical menu-item-icon tx-15"></i>
          <span class="menu-item-label">Historias Clínicas</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
        <!-- menu-item -->
      </a>

      <ul class="br-menu-sub nav flex-column">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/historiaclinica" class="nav-link">Listar Historias Clínicas</a>
        </li>
      </ul>
      <!-- br-menu-link -->
      <!-- br-menu-link -->
      <a href="#" class="br-menu-link">
        <div class="br-menu-item">
          <i class="fa-sharp fa-solid fa-wallet"></i>
          <span class="menu-item-label">Venta</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div>
        <!-- menu-item -->
      </a>

      <ul class="br-menu-sub nav flex-column">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>/caja" class="nav-link">Caja</a>
        </li>
      </ul>
      <!-- br-menu-link -->
    </div>
    <br />
  </div>
  <!-- fin menú -->
  <!-- FIN MENU LATERAL -->

  <!-- PANEL NAV -->
  <div class="br-header">
    <!-- inicio header izquierdo -->
    <div class="br-header-left">
      <div class="navicon-left hidden-md-down">
        <a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
      </div>
      <div class="navicon-left hidden-lg-up">
        <a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a>
      </div>
    </div>
    <!-- fin header izquierdo -->

    <!-- inicio header derecho -->
    <div class="br-header-right">
      <nav class="nav">
        <!-- inicio campo perfil -->
        <div class="dropdown mt-3 mr-4">
          <!-- Navbar Right Menu-->
          <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown list-unstyled"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <?php if (!empty(session('nombreCompleto'))) { ?>
                  <strong>
                    <?= session('nombreCompleto'); ?>
                  </strong>
                <?php } ?>
                <i class="ml-2 fa fa-user fa-lg"></i>
              </a>
              <ul class="mt-3 dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="<?php echo base_url() ?>/login/logaut"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- fin campo perfil -->
      </nav>

      <!-- navicon-right -->
    </div>
    <!-- fin header derecho-->
  </div>

  <!-- FIN PANEL NAV -->
  <!-- INICIO PANEL DASHBOARD -->
  <div class="br-mainpanel">
    <?php echo view($contenido); ?>
  </div>
  <!-- br-mainpanel -->
  <!-- FIN PANEL DASHBOARD -->


  <script src="<?php echo base_url(); ?>/public/lib/popper.js/popper.js"></script>
  <script src="<?php echo base_url(); ?>/public/lib/bootstrap/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>/public/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="<?php echo base_url(); ?>/public/lib/jquery-ui/jquery-ui.js"></script>
  <script src="<?php echo base_url(); ?>/public/lib/jquery-switchbutton/jquery.switchButton.js"></script>
  <script src="<?php echo base_url(); ?>/public/lib/peity/jquery.peity.js"></script>

  <!-- <script src="<?php echo base_url(); ?>/public/lib/bootstrap/bootstrap.js"></script> -->

  <script src="<?php echo base_url(); ?>/public/lib/jquery-ui/jquery-ui.js"></script>
  <script src="<?php echo base_url(); ?>/public/lib/peity/jquery.peity.js"></script>
  <!-- <script src="<?php echo base_url(); ?>/public/lib/chartist/chartist.js"></script> -->
  <script src="<?php echo base_url(); ?>/public/dist/js/DataTables-1.12.1/datatables-responsive/dataTables.responsive.js"></script>


  <script src="<?php echo base_url(); ?>/public/dist/js/main/bracket.js"></script>
  <script src="<?php echo base_url(); ?>/public/dist/js/ResizeSensor.js"></script>
  <script src="<?php echo base_url(); ?>/public/dist/js/main/dashboard.js"></script>
  <script src="<?php echo base_url(); ?>/public/dist/js/main/app.js"></script>

</body>

</html>