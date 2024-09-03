<?php require_once "views/shared/header.php"; ?>
<form action="index.php?controlador=AmenazaSalvaguarda&accion=store" method="post">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <div class="row justify-content-md-center">
        <div class="col-lg-4">
            <div class="card border-primary mb-6" style="max-width: 20rem;">
                <div class="card-header">AMENAZA</div>
                <div class="card-body">
                    
                    <label for="activo" class="form-label mt-4">Activo</label>
                    <select name="idActivo" id="activo" class="form-select">
                        <?php foreach ($data['Activos'] as $item) { ?>
                            <option value="<?= $item['idActivo'] ?>"><?= $item['activo'] ?></option>
                        <?php } ?>
                    </select>

                    <label for="tipoAmenaza" class="form-label mt-4">Tipo de Amenaza</label>
                    <select onchange="GenerarOptionsAmenaza(this)" name="idTipoAmenaza" id="idTipoAmenaza" class="form-select">
                        <?php foreach ($data['TipoAmenazas'] as $item) { ?>
                            <option value="<?= $item['idTipoAmenaza'] ?>"><?= $item['tipoAmenaza'] ?></option>
                        <?php } ?>
                    </select>

                    <label for="Amenazas" class="form-label mt-4">Amenazas</label>
                    <select name="Amenazas" onchange="OnChangeAmenaza(this)" id="Amenazas" class="form-select">
                    </select>

                    <label for="confidencialidad" class="form-label mt-4">Confidencialidad</label>
                    <select name="confidencialidadAmenaza" class="form-select" id="confidencialidadAmenaza">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>

                    <label for="integridad" class="form-label mt-4">Integridad</label>
                    <select name="integridadAmenaza" class="form-select" id="integridadAmenaza">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>

                    <label for="disponibilidad" class="form-label mt-4">Disponibilidad</label>
                    <select name="disponibilidadAmenaza" class="form-select" id="disponibilidadAmenaza">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>

                    <label for="probabilidad" class="form-label mt-4">Probabilidad</label>
                    <select name="probabilidad" id="probabilidad" class="form-select">
                        <?php foreach ($data['Probabilidad'] as $item) { ?>
                            <option value="<?= $item['idProbabilidad'] ?>"><?= $item['probabilidad'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">SALVAGUARDA</div>
                <div class="card-body">
                    

                    <label for="activo" class="form-label mt-4">Tipo de Salvaguarda</label>
                    <select onchange="generaroptionssalvaguardas(this)" name="idSalvaguarda" id="idSalvaguarda" class="form-select">
                        <?php foreach ($data['TipoSalvaguardas'] as $item) { ?>
                            <option value="<?= $item['idTipoSalvaguarda'] ?>"><?= $item['tipoSalvaguarda'] ?></option>
                        <?php } ?>
                    </select>

                    <label for="Salvaguarda" class="form-label mt-4">Salvaguarda</label>
                    <select name="Salvaguarda" id="Salvaguarda" class="form-select">
                    </select>

                    <label for="Proteccion" class="form-label mt-4">Nivel de Protección</label>
                    <select name="Proteccion" id="Proteccion" class="form-select">
                        <?php foreach ($data['Proteccion'] as $item) { ?>
                            <option value="<?= $item['idProteccion'] ?>"><?= $item['nivel'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>
        </div>
        <div style="text-align: center;" class="mb-5">
            <input type="submit" class="btn btn-primary mt-4" value="Guardar Amenaza y Salvaguardas">
        </div>

    </div>
</form>

<script>
    var amenazas= [];
    <?php foreach ($data['Amenazas'] as $item) { ?>
        amenazas[<?php echo $item['idAmenazas']?>] = {
        nombre: "<?php echo $item['amenaza']?>",
        idAmenaza: "<?php echo $item['idAmenazas']?>",
        tipo: "<?php echo $item['idTipoAmenaza']?>",
        confidencialidad: "<?php echo $item['confidencialidad']?>",
        integridad: "<?php echo $item['integridad']?>",
        disponibilidad: "<?php echo $item['disponibilidad']?>"
    };
    <?php } ?>
    function GenerarOptionsAmenaza(selectObject){
        var optionsamenaza = "";
        var tipo = selectObject.value;
        amenazas.forEach((amenaza) =>{
                if(tipo==amenaza.tipo){
                    optionsamenaza=optionsamenaza+`<option value='${amenaza.idAmenaza}'>`+amenaza.nombre+"</option>";
                }
            }
        );
        document.getElementById("Amenazas").innerHTML = optionsamenaza;
        var idAmenazaSeleccionada = document.getElementById("Amenazas").value;
        OnChangeAmenaza({value:idAmenazaSeleccionada});
    }
    GenerarOptionsAmenaza({value:1});
    

    //Desabilitar Opciones

    function OnChangeAmenaza(selectObject) {

        var idAmenazaSeleccionada = selectObject.value;
        
        amenazas.forEach((amenaza) =>{
                if(idAmenazaSeleccionada==amenaza.idAmenaza){
                    if(amenaza.confidencialidad == 0){
                        document.getElementById("confidencialidadAmenaza").disabled = true;
                    }else{
                        document.getElementById("confidencialidadAmenaza").disabled = false;
                    }   
                    if(amenaza.integridad == 0){
                        document.getElementById("integridadAmenaza").disabled = true;
                    }else{
                        document.getElementById("integridadAmenaza").disabled = false;
                    }  
                    if(amenaza.disponibilidad == 0){
                        document.getElementById("disponibilidadAmenaza").disabled = true;
                    }else{
                        document.getElementById("disponibilidadAmenaza").disabled = false;
                    } 
                }
            }
        );
    }
    OnChangeAmenaza({value:1});

    //salvaguardas 
    
    var salvaguardas= [];
    <?php foreach ($data["Salvaguardas"] as $item) { ?>
        salvaguardas[<?php echo $item['idSalvaguardas']?>] = {
        nombre: "<?php echo $item['salvaguarda']?>",
        idSalvaguarda: "<?php echo $item['idSalvaguardas']?>",
        tipo: "<?php echo $item['idTipoSalva']?>"
    };
    <?php } ?>
    function generaroptionssalvaguardas(selectObject){
        var optionsSalvaguarda = "";
        var tipo = selectObject.value;
        salvaguardas.forEach((salvaguarda) =>{
                if(tipo==salvaguarda.tipo){
                    optionsSalvaguarda=optionsSalvaguarda+`<option value='${salvaguarda.idSalvaguarda}'>`+salvaguarda.nombre+"</option>";
                }
            }
        );
        document.getElementById("Salvaguarda").innerHTML = optionsSalvaguarda;
    }

    generaroptionssalvaguardas({value:1});
</script>

<?php require_once "views/shared/footer.php"; ?>