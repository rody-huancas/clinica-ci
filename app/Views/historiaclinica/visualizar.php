<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $titulo  ?></h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <a href="<?php echo base_url() ?>/historiaclinica" class="btn btn-info mb-2"><i class="fa-sharp fa-solid fa-arrow-left mr-2"></i>Regresar</a>
        <div class="br-section-wrapper mx-auto mb-5 container__historia" id="sHistoria">
            <!-- Los estilos están en: public/styles/estilos.css -->
            <div class="historia">
                <div class="historia__container-header">
                    <img class="hitoria__img" src="<?php echo base_url(); ?>/public/dist/images/enfoque-salud.jpg" alt="Logo clinica cercado" width="150px">
                    <div class="hitoria__header">
                        <p class="historia__item">N° de Historia: <span><?= $historia["codigohistoria"] ?></span></p>
                        <p class="historia__item">Fecha: <span><?= $historia["fechaCreacion"] ?></span></p>
                        <p class="historia__item">Hora: <span><?= $historia["horaCreacion"] ?></span></p>
                    </div>
                </div>

                <div class="historia__group">
                    <h2 class="historia__titulo">Datos del Paciente</h2>
                    <div class="historia__container">
                        <p class="historia__item">Nombre: <span><?= $historia["nombres"] ?></span></p>
                        <p class="historia__item">Apellidos: <span><?= $historia["apellidos"] ?></span></p>
                        <p class="historia__item">DNI: <span><?= $historia["dni"] ?></span></p>
                        <p class="historia__item">Fecha de Nacimiento: <span><?= $historia["fechaNac"] ?></span></p>
                        <p class="historia__item">Edad: <span><?= $historia["edad"] ?></span></p>
                        <p class="historia__item">Dirección: <span><?= $historia["direccion"] ?></span></p>
                        <p class="historia__item">Distrito: <span><?= $historia["distrito"] ?></span></p>
                        <p class="historia__item">Provincia: <span><?= $historia["provincia"] ?></span></p>
                        <p class="historia__item">DTTO: <span><?= $historia["departamento"] ?></span></p>
                        <p class="historia__item">Télefono: <span><?= $historia["telefonoPaciente"] ?></span></p>
                    </div>

                    <!-- <h2 class="historia__titulo">Datos del Familiar</h2>
                    <div class="historia__container">
                        <p class="historia__item">Parentezco: <span><?= $historia["parentezco"] ?></span></p>
                        <p class="historia__item">DNI: <span><?= $historia["dnifamiliar"] ?></span></p>
                        <p class="historia__item">Télefono: <span><?= $historia["telefono"] ?></span></p>
                    </div> -->

                    <h2 class="historia__titulo">Datos del Médico</h2>
                    <div class="historia__container">
                        <p class="historia__item">Médico: <span><?= $historia["nombreMedico"] ?></span></p>
                        <p class="historia__item">Origen: <span><?= $historia["origen"] ?></span></p>
                        <p class="historia__item">Motivo: <span><?= $historia["motivo"] ?></span></p>
                    </div>
                </div>
            </div>
            <div class="historia__boton">
                <button class="historia__btn" onclick="printHistoria()" style="cursor: pointer;">
                    <i class="fa fa-print"></i> Imprimir
                </button>
            </div>
        </div>
        <!-- br-section-wrapper -->
    </div>
</div>

<script>
    function printHistoria() {
        var printContents = document.querySelector('.container__historia').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>