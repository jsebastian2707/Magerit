<?php require_once "views/shared/header.php"; ?>

<form action="index.php?controlador=Activo&accion=updateActivoAmenazaSalvaguarda" method="post" > 
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>

    <div class="row justify-content-md-center">
        <div class="col-lg-4">
            <div class="card border-primary mb-3 mx-auto" style="max-width: 20rem;" >
                <div class="card-header">ACTIVO</div>
                <div class="card-body">

                    <input type="hidden" name="id_activo" value="<?=  $data['Activo']['idActivo']?>">
                    <input type="hidden" name="id_amenaza" value="<?=  $data['AmenazaSalvaguarda']['idAmenaza']?>">
                    <input type="hidden" name="id_salvaguarda" value="<?=  $data['AmenazaSalvaguarda']['idSalvaguarda']?>">

                    <label for="tipo_de_activo" class="form-label mt-4">Nombre del Activo</label>
                    <input type="text" required class="form-control" placeholder="nombre activo" name="nombre_activo" value="<?= $data['Activo']['activo']?>">
                    
                    <label for="tipo_de_activo" class="form-label mt-4">Tipo de Activo</label>
                    <select name="tipo_de_activo" id="tipo_de_activo" class="form-select">
                        <?php foreach($data['TiposActivos'] as $item){?>

                            <?php if($item['idTipoActivo'] == $data['Activo']['idTipoActivo']){?>
                                <option value="<?= $item['idTipoActivo']?>" selected><?= $item['tipoActivo']?></option>
                            <?php }else{?>
                                <option value="<?= $item['idTipoActivo']?>"><?= $item['tipoActivo']?></option>
                            <?php }?>

                        <?php }?>
                    </select>
                    
                    <?php $calificicacion = ['Bajo', 'Medio', 'Alto']; ?>

                    <label for="confidencialidad" class="form-label mt-4">Confidencialidad</label>
                    <select name="confidencialidad_activo" class="form-select" id="confidencialidad">
                        <?php foreach($calificicacion as $item){?>

                            <?php if($item == $data['Activo']['confidencialidad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="integridad" class="form-label mt-4">Integridad</label>
                    <select name="integridad_activo" class="form-select" id="integridad">
                        <?php foreach($calificicacion as $item){?>

                            <?php if($item == $data['Activo']['integridad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="disponibilidad" class="form-label mt-4">Disponibilidad</label>
                    <select name="disponibilidad_activo" class="form-select" id="disponibilidad">
                        <?php foreach($calificicacion as $item){?>

                            <?php if($item == $data['Activo']['disponibilidad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="trazabilidad" class="form-label mt-4">Trazabilidad</label>
                    <select name="trazabilidad_activo" class="form-select" id="trazabilidad">
                        <?php foreach($calificicacion as $item){?>

                            <?php if($item == $data['Activo']['trazabilidad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="autenticidad" class="form-label mt-4">Autenticidad</label>
                    <select name="autenticidad_activo" class="form-select" id="autenticidad">
                        <?php foreach($calificicacion as $item){?>

                            <?php if($item == $data['Activo']['autenticidad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>
                    
                    <?php $valor = [1, 2, 3, 4, 5]; ?>

                    <label for="valor" class="form-label mt-4">Valor</label>
                    <select name="valor_activo" class="form-select" id="valor">
                        <?php foreach($valor as $item){?>

                            <?php if($item == $data['Activo']['valor']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-primary mb-6" style="max-width: 20rem;">
                <div class="card-header">AMENAZA</div>
                <div class="card-body">

                    <label for="tipoAmenaza" class="form-label mt-4">Tipo de Amenaza</label>
                    <select onchange="GenerarOptionsAmenaza(this)" name="idTipoAmenaza" id="idTipoAmenaza" class="form-select">

                        <?php foreach($data['TipoAmenazas'] as $item){?>

                            <?php if($item['idTipoAmenaza'] == $data['AmenazaSalvaguarda']['idTipoAmenaza']){?>
                                <option value="<?= $item['idTipoAmenaza'] ?>" selected><?= $item['tipoAmenaza'] ?></option>
                            <?php }else{?>
                                <option value="<?= $item['idTipoAmenaza'] ?>"><?= $item['tipoAmenaza'] ?></option>
                            <?php }?>

                        <?php }?>

                    </select>

                    <label for="Amenazas" class="form-label mt-4">Amenazas</label>
                    <select name="Amenazas" onchange="OnChangeAmenaza(this)" id="Amenazas" class="form-select">
                    </select>
                    
                    <?php $valorAmenaza = [0, 1, 2, 3]; ?>

                    <label for="confidencialidad" class="form-label mt-4">Confidencialidad</label>
                    <select name="confidencialidadAmenaza" class="form-select" id="confidencialidadAmenaza">
                        <?php foreach($valorAmenaza as $item){?>

                            <?php if($item == $data['AmenazaSalvaguarda']['confidencialidad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="integridad" class="form-label mt-4">Integridad</label>
                    <select name="integridadAmenaza" class="form-select" id="integridadAmenaza">
                        <?php foreach($valorAmenaza as $item){?>

                            <?php if($item == $data['AmenazaSalvaguarda']['integridad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="disponibilidad" class="form-label mt-4">Disponibilidad</label>
                    <select name="disponibilidadAmenaza" class="form-select" id="disponibilidadAmenaza">
                        <?php foreach($valorAmenaza as $item){?>

                            <?php if($item == $data['AmenazaSalvaguarda']['disponibilidad']){?>
                                <option selected><?= $item?></option>
                            <?php }else{?>
                                <option><?= $item?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="probabilidad" class="form-label mt-4">Probabilidad</label>
                    <select name="probabilidad" id="probabilidad" class="form-select">

                        <?php foreach($data['Probabilidad'] as $item){?>

                            <?php if($item['idProbabilidad'] == $data['AmenazaSalvaguarda']['idProbabilidad']){?>
                                <option value="<?= $item['idProbabilidad'] ?>" selected><?= $item['probabilidad'] ?></option>
                            <?php }else{?>
                                <option value="<?= $item['idProbabilidad'] ?>"><?= $item['probabilidad'] ?></option>
                            <?php }?>

                        <?php }?>
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
                        <?php foreach($data['TipoSalvaguardas'] as $item){?>

                            <?php if($item['idTipoSalvaguarda'] == $data['AmenazaSalvaguarda']['idTipoSalvaguarda']){?>
                                <option value="<?= $item['idTipoSalvaguarda'] ?>" selected><?= $item['tipoSalvaguarda'] ?></option>
                            <?php }else{?>
                                <option value="<?= $item['idTipoSalvaguarda'] ?>"><?= $item['tipoSalvaguarda'] ?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                    <label for="Salvaguarda" class="form-label mt-4">Salvaguarda</label>
                    <select name="Salvaguarda" id="Salvaguarda" class="form-select">
                    </select>

                    <label for="Proteccion" class="form-label mt-4">Nivel de Protección</label>
                    <select name="Proteccion" id="Proteccion" class="form-select">
                        <?php foreach($data['Proteccion'] as $item){?>

                            <?php if($item['idProteccion'] == $data['AmenazaSalvaguarda']['idProteccion']){?>
                                <option value="<?= $item['idProteccion'] ?>" selected><?= $item['nivel'] ?></option>
                            <?php }else{?>
                                <option value="<?= $item['idProteccion'] ?>"><?= $item['nivel'] ?></option>
                            <?php }?>

                        <?php }?>
                    </select>

                </div>
            </div>
        </div>

        <div style="text-align: center;" class="mb-5">
            <input type="submit" class="btn btn-primary mt-4" value="Editar Activo">
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
                    if( amenaza.idAmenaza == <?= $data['AmenazaSalvaguarda']['amenaza'] ?> ){
                        optionsamenaza=optionsamenaza+`<option value='${amenaza.idAmenaza}' selected>`+amenaza.nombre+"</option>";
                    }else{
                        optionsamenaza=optionsamenaza+`<option value='${amenaza.idAmenaza}'>`+amenaza.nombre+"</option>";
                    } 
                }
            }
        );
        document.getElementById("Amenazas").innerHTML = optionsamenaza;
        var idAmenazaSeleccionada = document.getElementById("Amenazas").value;
        OnChangeAmenaza({value:idAmenazaSeleccionada});
    }
    GenerarOptionsAmenaza({value:<?= $data['AmenazaSalvaguarda']['idTipoAmenaza'] ?>});
    

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
    OnChangeAmenaza({value:<?= $data['AmenazaSalvaguarda']['amenaza'] ?>});

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
                    if( salvaguarda.idSalvaguarda == <?= $data['AmenazaSalvaguarda']['salvaguarda'] ?> ){
                        optionsSalvaguarda=optionsSalvaguarda+`<option value='${salvaguarda.idSalvaguarda}' selected>`+salvaguarda.nombre+"</option>";
                    }else{
                        optionsSalvaguarda=optionsSalvaguarda+`<option value='${salvaguarda.idSalvaguarda}'>`+salvaguarda.nombre+"</option>";
                    } 

                    
                }
            }
        );
        document.getElementById("Salvaguarda").innerHTML = optionsSalvaguarda;
    }
    generaroptionssalvaguardas({value:<?= $data['AmenazaSalvaguarda']['idTipoSalvaguarda'] ?>});
</script>

<?php require_once "views/shared/footer.php"; ?>