<?php require_once "views/shared/header.php"; ?>


<form action="index.php?controlador=Activo&accion=updateActivo" method="post" > 
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <div class="card border-primary mb-3 mx-auto" style="max-width: 20rem;" >
        <div class="card-body">

            <input type="hidden" name="id_activo" value="<?=  $data['Activo']['idActivo']?>">

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

            <input type="submit" class="btn btn-primary mt-4" value="Editar Activo">
        </div>
    </div>
</form>

<?php require_once "views/shared/footer.php"; ?>