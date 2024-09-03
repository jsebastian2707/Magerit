<?php require_once "views/shared/header.php"; ?>

<form action="index.php?controlador=Activo&accion=store" method="post" >

    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <div class="card border-primary mb-3 mx-auto" style="max-width: 20rem;" >
        <div class="card-body">
            <label for="tipo_de_activo" class="form-label mt-4">Nombre del Activo</label>
            <input type="text" required class="form-control" placeholder="nombre activo" name="nombre_activo">
            
            <label for="tipo_de_activo" class="form-label mt-4">Tipo de Activo</label>
            <select name="tipo_de_activo" id="tipo_de_activo" class="form-select">
                <?php foreach($data['TiposActivos'] as $item){?>
                    <option value="<?= $item['idTipoActivo']?>"><?= $item['tipoActivo']?></option>
                <?php }?>
            </select>
            <label for="confidencialidad" class="form-label mt-4">Confidencialidad</label>
            <select name="confidencialidad_activo" class="form-select" id="confidencialidad">
                <option>Bajo</option>
                <option>Medio</option>
                <option>Alto</option>
            </select>
            <label for="integridad" class="form-label mt-4">Integridad</label>
            <select name="integridad_activo" class="form-select" id="integridad">
                <option>Bajo</option>
                <option>Medio</option>
                <option>Alto</option>
            </select>
            <label for="disponibilidad" class="form-label mt-4">Disponibilidad</label>
            <select name="disponibilidad_activo" class="form-select" id="disponibilidad">
                <option>Bajo</option>
                <option>Medio</option>
                <option>Alto</option>
            </select>
            <label for="trazabilidad" class="form-label mt-4">Trazabilidad</label>
            <select name="trazabilidad_activo" class="form-select" id="trazabilidad">
                <option>Bajo</option>
                <option>Medio</option>
                <option>Alto</option>
            </select>
            <label for="autenticidad" class="form-label mt-4">Autenticidad</label>
            <select name="autenticidad_activo" class="form-select" id="autenticidad">
                <option>Bajo</option>
                <option>Medio</option>
                <option>Alto</option>
            </select>
            <label for="valor" class="form-label mt-4">Valor</label>
            <select name="valor_activo" class="form-select" id="valor">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <input type="submit" class="btn btn-primary mt-4" value="Crear Activo">
        </div>
    </div>
    
</form>

<?php require_once "views/shared/footer.php"; ?>