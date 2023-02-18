<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>/public/dist/img/icons8-clínica-48.png">

    <title>Inicio de sesión</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/login/css/style.css">

</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url(); ?>/public/login/images/fondo.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3 class="p-4 text-center"><strong><?php echo $titulo; ?></strong></h3>
                        <?php error_reporting(0); ?>
                        <form name="formLogin" id="formLogin" action="<?php echo base_url() ?>/login/validacion_do" method="post">
                            <div class="form-group first">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" placeholder="Ingrese su usuario" id="txt_usuario" name="txt_usuario" value="<?= set_value('txt_usuario'); ?>">
                                <p id="errCategoria" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('txt_usuario') : ""; ?>
                                </p>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="password" name="password" value="<?= set_value('password'); ?>">
                                <p id="errCategoria" style="color:red">
                                    <?php echo (isset($validation)) ? $validation->getError('password') : ""; ?>
                                </p>
                            </div>
                            <?php if (isset($_SESSION["msj_login"])) : ?>
                                 <small class="form-text text-center text-danger"><b><?php echo $_SESSION["msj_login"]; ?></b></small>
                            <?php endif; ?>
                            <input type="submit" value="Ingresar" class="btn btn-block text-white" style="background-color: #4A6CC2;">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>

</html>