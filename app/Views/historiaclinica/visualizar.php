<div class="pd-t-30 pd-l-60">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $titulo  ?></h4>
</div>

<div class="br-pagebody pd-x-30">
    <div class="br-pagebody">
        <div class="br-section-wrapper mb-5 container__historia" id="sHistoria">
            <!-- Los estilos están en: public/styles/estilos.css -->
            <div class="historia">
                <div class="datos">
                    <img class="datos__img" src="<?php echo base_url(); ?>/public/dist/images/clinica-cercado.jpg" alt="Logo clinica cercado">
                    <div class="datos__container">
                        <p class="datos__historia">N° de Historia: <span><?= $historia["codigohistoria"] ?></span></p>
                        <p class="datos__historia">Fecha: <span><?= $historia["fechaCreacion"] ?></span></p>
                        <p class="datos__historia">Hora: <span><?= $historia["horaCreacion"] ?></span></p>
                    </div>
                </div>

                <h2 class="titulo-item">Datos del Paciente</h2>
                <div class="paciente">
                    <p class="paciente__item">Nombre: <span><?= $historia["nombres"] ?></span></p>
                    <p class="paciente__item">Apellidos: <span><?= $historia["apellidos"] ?></span></p>
                    <p class="paciente__item">DNI: <span><?= $historia["dni"] ?></span></p>
                    <p class="paciente__item">Fecha de Nacimiento: <span><?= $historia["fechaNac"] ?></span></p>
                    <p class="paciente__item">Edad: <span><?= $historia["edad"] ?></span></p>
                    <p class="paciente__item">Dirección: <span><?= $historia["direccion"] ?></span></p>
                    <p class="paciente__item">Distrito: <span><?= $historia["distrito"] ?></span></p>
                    <p class="paciente__item">Provincia: <span><?= $historia["provincia"] ?></span></p>
                    <p class="paciente__item">DTTO: <span></p>
                    <p class="paciente__item">Télefono: <span><?= $historia["telefono"] ?></span></p>
                </div>

                <h2 class="titulo-item">Datos del Familiar</h2>
                <div class="familiar">
                    <p class="familiar__item">Parentezco: <span><?= $historia["parentezco"] ?></span></p>
                    <p class="familiar__item">DNI: <span><?= $historia["dnifamiliar"] ?></span></p>
                    <p class="familiar__item">Télefono: <span><?= $historia["telefono"] ?></span></p>
                </div>

                <h2 class="titulo-item">Datos del Médico</h2>
                <div class="medico">
                    <p class="medico__item">Médico: <span></span></p>
                    <p class="medico__item">Origen: <span></span></p>
                    <p class="medico__item">Motivo: <span><?= $historia["motivo"] ?></span></p>
                </div>
            </div>
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><button class="btn btn-primary" onclick="printHistoria()"><i class="fa fa-print"></i> Imprimir</button></div>
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