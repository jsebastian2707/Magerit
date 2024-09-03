<?php require_once "views/shared/header.php"; ?>

    <div>
        <h1 class="text-center my-5"><?= $data["titulo"] ?></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="5" style="text-align: center; font-size: 24px;">Valor</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="3" style="text-align: center; font-size: 24px;">Valoración del impacto</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center; font-size: 24px;">Acciones</th>
                    <th>Tipo de Activo</th>
                    <th>Activo</th>
                    <th>Confidencialidad</th>
                    <th>Integridad</th>
                    <th>Disponibilidad</th>
                    <th>Trazabilidad</th>
                    <th>Autenticidad</th>
                    <th>Valor</th>
                    <th>Tipo de Amenaza</th>
                    <th>Amenaza</th>
                    <th>Confidencialidad</th>
                    <th>Integridad</th>
                    <th>Disponibilidad</th>
                    <th>Impacto Potencial</th>
                    <th>Probabilidad</th>
                    <th>Riesgo Potencial</th>
                    <th>Tipo Salvaguarda</th>
                    <th>Salvaguarda</th>
                    <th>Nivel</th>
                    <th>Proteccion</th>
                    <th>Impacto Residual</th>
                    <th>Riesgo Residual</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['Activos'] as $Activo) {?>

                    
                    <?php if( isset($data["AmenazasSalvaguardas"][$data["Contador"]]["idActivo"]) && $data["AmenazasSalvaguardas"][$data["Contador"]]["idActivo"] == $Activo['idActivo']){?>
                        <?php foreach($data['AmenazasSalvaguardas'] as $AmenazasSalvaguardas) {?>
                            <?php if($AmenazasSalvaguardas["idActivo"] == $Activo['idActivo']){?>
                                <tr>
                                    <td>
                                        <?= "<a href='index.php?controlador=Activo&accion=editActivoAmenazaSalvaguarda&id=" . $Activo['idActivo'] . "&idAmenaza=". $AmenazasSalvaguardas["idAmenaza"] . "&idSalvaguarda=". $AmenazasSalvaguardas["idSalvaguarda"] . "' class='btn btn-warning me-3'>Editar</a>" ?>
                                    </td>
                                    <td>
                                        <?= "<a href='index.php?controlador=Activo&accion=deleteActivoAmenazaSalvaguarda&id=" . $Activo['idActivo'] . "&idAmenaza=". $AmenazasSalvaguardas["idAmenaza"] . "&idSalvaguarda=". $AmenazasSalvaguardas["idSalvaguarda"] . "' class='btn btn-danger'>Eliminar</a>" ?>
                                    </td>
                                    <td><?= $Activo['tipoActivo']?></td>
                                    <td><?= $Activo['activo']?></td>
                                    <td><?= $Activo['confidencialidad']?></td>
                                    <td><?= $Activo['integridad']?></td>
                                    <td><?= $Activo['disponibilidad']?></td>
                                    <td><?= $Activo['trazabilidad']?></td>
                                    <td><?= $Activo['autenticidad']?></td>
                                    <td><?= $Activo['valor']?></td>
                                    <td><?= $AmenazasSalvaguardas['tipoAmenaza']?></td>
                                    <td><?= $AmenazasSalvaguardas['amenaza']?></td>
                                    <td><?= $AmenazasSalvaguardas['confidencialidad']?></td>
                                    <td><?= $AmenazasSalvaguardas['integridad']?></td>
                                    <td><?= $AmenazasSalvaguardas['disponibilidad']?></td>
                                    <td><?= $AmenazasSalvaguardas['confidencialidad']+$AmenazasSalvaguardas['integridad']+$AmenazasSalvaguardas['disponibilidad']?></td>
                                    <td><?= $AmenazasSalvaguardas['probabilidad']?></td>
                                    <td><?php echo (($AmenazasSalvaguardas['confidencialidad']+$AmenazasSalvaguardas['integridad']+$AmenazasSalvaguardas['disponibilidad']) * $AmenazasSalvaguardas['valor']);?></td> 
                                    <td><?= $AmenazasSalvaguardas['tipoSalvaguarda']?></td>
                                    <td><?= $AmenazasSalvaguardas['salvaguarda']?></td>
                                    <td><?= $AmenazasSalvaguardas['nivel']?></td>
                                    <td><?php echo ($AmenazasSalvaguardas['proteccion']*100)."%"?></td>
                                    <td><?php $ImpactoPotancial = $AmenazasSalvaguardas['confidencialidad']+$AmenazasSalvaguardas['integridad']+$AmenazasSalvaguardas['disponibilidad'];
                                            echo( $ImpactoPotancial -($ImpactoPotancial*$AmenazasSalvaguardas['proteccion']));?>
                                    </td> 
                                    <td><?php $ImpactoPotancial = $AmenazasSalvaguardas['confidencialidad']+$AmenazasSalvaguardas['integridad']+$AmenazasSalvaguardas['disponibilidad'];
                                              $ImpactoResidual = ($ImpactoPotancial*$AmenazasSalvaguardas['proteccion']);
                                              $RiesgoPotencial = ($AmenazasSalvaguardas['confidencialidad']+$AmenazasSalvaguardas['integridad']+$AmenazasSalvaguardas['disponibilidad']) * $AmenazasSalvaguardas['valor'];
                                              echo ($RiesgoPotencial - ($ImpactoResidual * $AmenazasSalvaguardas['valor']));?>
                                    </td>
                                </tr>
                                <?php $data["Contador"]++;?>
                            <?php }?>
                        <?php }?>
                    <?php } else{?>

                        <tr>
                            <td>
                                <?= "<a href='index.php?controlador=Activo&accion=editActivo&id=" . $Activo['idActivo'] . "' class='btn btn-warning me-3'>Editar</a>" ?>
                            </td>
                            <td>
                                <?= "<a href='index.php?controlador=Activo&accion=deleteActivo&id=" . $Activo['idActivo'] . "' class='btn btn-danger'>Eliminar</a>" ?>
                            </td>
                            <td><?= $Activo['tipoActivo']?></td>
                            <td><?= $Activo['activo']?></td>
                            <td><?= $Activo['confidencialidad']?></td>
                            <td><?= $Activo['integridad']?></td>
                            <td><?= $Activo['disponibilidad']?></td>
                            <td><?= $Activo['trazabilidad']?></td>
                            <td><?= $Activo['autenticidad']?></td>
                            <td><?= $Activo['valor']?></td>
                        </tr>
                    <?php }?>
                <?php }?>
            </tbody>
        </table>
    </div>

<?php require_once "views/shared/footer.php"; ?>