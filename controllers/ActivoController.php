<?php

class ActivoController{
    public function __construct(){
        require_once "models/Activo.php";
        require_once "models/AmenazaSalvaguarda.php";
    }

    public function index(){
        $activo = new Activo();
        $data["titulo"] = "Listado de Activos";
        $data["Activos"] = $activo->listarActivos();

        require_once "models/AmenazaSalvaguarda.php";
        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $data["AmenazasSalvaguardas"] = $AmenazaSalvaguarda->listarAmenazasSalvaguardas();
        $data["Contador"] = 0;
        // Cargar la vista
        require_once "views/activos/index.php";
    }

    // Mostrar la vista para crear el registro
    public function insert(){

        $activo = new Activo();
        $data["titulo"] = "Crear Activo";
        $data["TiposActivos"] = $activo->listarTipoActivos();
        require_once "views/Activos/insert.php";
    }

    public function store(){

        // Recibir los datos del formulario
        $nombreActivo = $_POST['nombre_activo'];
        $idTipoActivo = $_POST['tipo_de_activo'];
        $confidencialidadActivo= $_POST['confidencialidad_activo'];
        $integridadActivo= $_POST['integridad_activo'];
        $disponibilidadActivo= $_POST['disponibilidad_activo'];
        $trazabilidadActivo= $_POST['trazabilidad_activo'];
        $autenticidadActivo= $_POST['autenticidad_activo'];
        $valorActivo= $_POST['valor_activo'];

        // Guardar el registro
        $activo = new Activo();
        $activo->insert($nombreActivo, $idTipoActivo, $confidencialidadActivo, $integridadActivo, $disponibilidadActivo, $trazabilidadActivo, $autenticidadActivo, $valorActivo);

        // Enviar a la vista index
        $this->index();
    }


    public function editActivoAmenazaSalvaguarda($idActivo, $idAmenaza, $idSalvaguarda){

        $activo = new Activo();
        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $data['titulo'] = "Actualizar Activo";
        $data['Activo'] = $activo->getActivo($idActivo);
        $data["TiposActivos"] = $activo->listarTipoActivos();
        $data['AmenazaSalvaguarda'] = $AmenazaSalvaguarda->getAmenazaSalvaguarda($idActivo, $idAmenaza, $idSalvaguarda);

        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $data["TipoAmenazas"] = $AmenazaSalvaguarda->listarTiposAmenazas();
        $data["Amenazas"] = $AmenazaSalvaguarda->listarAmenazas();
        $data["TipoSalvaguardas"] = $AmenazaSalvaguarda->listarTiposSalvaguardas();
        $data["Salvaguardas"] = $AmenazaSalvaguarda->listarSalvaguardas();
        $data["Probabilidad"] = $AmenazaSalvaguarda->listarProbabilidad();
        $data["Proteccion"] = $AmenazaSalvaguarda->listarProteccion();

        require_once "views/amenazaSalvaguarda/edit.php";
    }

    public function editActivo($idActivo){

        $activo = new Activo();

        $data['titulo'] = "Actualizar Activo";
        $data['Activo'] = $activo->getActivo($idActivo);
        $data["TiposActivos"] = $activo->listarTipoActivos();

        require_once "views/Activos/edit.php";
    }

    public function updateActivo(){

        // recibir los datos del formulario
        $idActivo = $_POST['id_activo'];
        $nombreActivo = $_POST['nombre_activo'];
        $idTipoActivo = $_POST['tipo_de_activo'];
        $confidencialidadActivo= $_POST['confidencialidad_activo'];
        $integridadActivo= $_POST['integridad_activo'];
        $disponibilidadActivo= $_POST['disponibilidad_activo'];
        $trazabilidadActivo= $_POST['trazabilidad_activo'];
        $autenticidadActivo= $_POST['autenticidad_activo'];
        $valorActivo= $_POST['valor_activo'];

        $activo = new Activo();
        $activo->updateActivo($idActivo, $nombreActivo, $idTipoActivo, $confidencialidadActivo, $integridadActivo, $disponibilidadActivo, $trazabilidadActivo, $autenticidadActivo, $valorActivo);
        $this->index();
    }

    public function updateActivoAmenazaSalvaguarda(){

        // ACTUALIZAR ACTIVO
        $idActivo = $_POST['id_activo'];
        $nombreActivo = $_POST['nombre_activo'];
        $idTipoActivo = $_POST['tipo_de_activo'];
        $confidencialidadActivo= $_POST['confidencialidad_activo'];
        $integridadActivo= $_POST['integridad_activo'];
        $disponibilidadActivo= $_POST['disponibilidad_activo'];
        $trazabilidadActivo= $_POST['trazabilidad_activo'];
        $autenticidadActivo= $_POST['autenticidad_activo'];
        $valorActivo= $_POST['valor_activo'];
        $activo = new Activo();
        $activo->updateActivo($idActivo, $nombreActivo, $idTipoActivo, $confidencialidadActivo, $integridadActivo, $disponibilidadActivo, $trazabilidadActivo, $autenticidadActivo, $valorActivo);

        // ACTUALIZAR AMENAZA Y SALVAGUARDA

        $idAmenaza = $_POST['id_amenaza'];
        $idTipoAmenaza = $_POST['idTipoAmenaza'];
        $amenaza = $_POST['Amenazas'];

        if (isset($_POST['confidencialidadAmenaza'])) {
            $confidencialidadAmenaza = $_POST['confidencialidadAmenaza'];
        }else{
            $confidencialidadAmenaza = 0;
        }
        
        if (isset($_POST['integridadAmenaza'])) {
            $integridadAmenaza = $_POST['integridadAmenaza'];
        }else{
            $integridadAmenaza = 0;
        }

        if (isset($_POST['disponibilidadAmenaza'])) {
            $disponibilidadAmenaza = $_POST['disponibilidadAmenaza'];
        }else{
            $disponibilidadAmenaza = 0;
        }
    
        $probabilidad = $_POST['probabilidad'];

        $idSalvaguarda = $_POST['id_salvaguarda'];
        $idTipoSalvaguarda = $_POST['idSalvaguarda'];
        $salvaguarda = $_POST['Salvaguarda'];
        $proteccion = $_POST['Proteccion'];


        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $AmenazaSalvaguarda->updateAmenaza($idAmenaza, $idTipoAmenaza, $probabilidad, $amenaza, $confidencialidadAmenaza, $integridadAmenaza, $disponibilidadAmenaza);
        $AmenazaSalvaguarda->updateSalvaguarda($idSalvaguarda, $idTipoSalvaguarda, $proteccion, $salvaguarda);

        $this->index();
    }

    public function deleteActivoAmenazaSalvaguarda($id, $idAmenaza, $idSalvaguarda){

        $activo = new Activo();
        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $AmenazaSalvaguarda->deleteAmenaza($idAmenaza);
        $AmenazaSalvaguarda->deleteSalvaguarda($idSalvaguarda);
        $this->index();
    }

    public function deleteActivo($id){

        $activo = new Activo();
        $activo->deleteActivo($id);
        $this->index();
    }


    public function generarMapaCalor(){

        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $data["titulo"] = "MAPAS DE CALOR";
        $data["MP"] = $AmenazaSalvaguarda->listarDatosMP();
        $data["ImpactoPotencial"] = [];
        $data["Frecuencia"] = [];
        $data["ImpactoResidual"] = [];

        foreach($data["MP"] as $item){
            $suma = $item['confidencialidad']+$item['integridad']+$item['disponibilidad'];
            $data["ImpactoPotencial"][] = $suma;
            $data["Frecuencia"][] = $item['valor'];
            $data["ImpactoResidual"][] = $suma - ($suma*$item['proteccion']);
        }

        $data["ActivosPosiciones"] = [];
        $data["ActivosMPDespues"] =[];
        for ($i = 0; $i < 25; $i++) {
            $data["ActivosPosiciones"][]=0;
            $data["ActivosMPDespues"][] = 0;
        }
        

        for ($i = 0; $i < count($data["ImpactoPotencial"]); $i++){

            if($data["Frecuencia"][$i] == 0.01){
                if($data["ImpactoPotencial"][$i] == 1 || $data["ImpactoPotencial"][$i] == 2){
                    $data["ActivosPosiciones"][0]++;
                }else if($data["ImpactoPotencial"][$i] == 3 || $data["ImpactoPotencial"][$i] == 4){
                    $data["ActivosPosiciones"][1]++;
                }else if($data["ImpactoPotencial"][$i] == 5 || $data["ImpactoPotencial"][$i] == 6){
                    $data["ActivosPosiciones"][2]++;
                }else if($data["ImpactoPotencial"][$i] == 7 || $data["ImpactoPotencial"][$i] == 8){
                    $data["ActivosPosiciones"][3]++;
                }else if($data["ImpactoPotencial"][$i] == 9){
                    $data["ActivosPosiciones"][4]++;
                }
            }else if($data["Frecuencia"][$i] == 0.1){
                if($data["ImpactoPotencial"][$i] == 1 || $data["ImpactoPotencial"][$i] == 2){
                    $data["ActivosPosiciones"][5]++;
                }else if($data["ImpactoPotencial"][$i] == 3 || $data["ImpactoPotencial"][$i] == 4){
                    $data["ActivosPosiciones"][6]++;
                }else if($data["ImpactoPotencial"][$i] == 5 || $data["ImpactoPotencial"][$i] == 6){
                    $data["ActivosPosiciones"][7]++;
                }else if($data["ImpactoPotencial"][$i] == 7 || $data["ImpactoPotencial"][$i] == 8){
                    $data["ActivosPosiciones"][8]++;
                }else if($data["ImpactoPotencial"][$i] == 9){
                    $data["ActivosPosiciones"][9]++;
                }
            }else if($data["Frecuencia"][$i] == 1){
                if($data["ImpactoPotencial"][$i] == 1 || $data["ImpactoPotencial"][$i] == 2){
                    $data["ActivosPosiciones"][10]++;
                }else if($data["ImpactoPotencial"][$i] == 3 || $data["ImpactoPotencial"][$i] == 4){
                    $data["ActivosPosiciones"][11]++;
                }else if($data["ImpactoPotencial"][$i] == 5 || $data["ImpactoPotencial"][$i] == 6){
                    $data["ActivosPosiciones"][12]++;
                }else if($data["ImpactoPotencial"][$i] == 7 || $data["ImpactoPotencial"][$i] == 8){
                    $data["ActivosPosiciones"][13]++;
                }else if($data["ImpactoPotencial"][$i] == 9){
                    $data["ActivosPosiciones"][14]++;
                }
            }else if($data["Frecuencia"][$i] == 10){
                if($data["ImpactoPotencial"][$i] == 1 || $data["ImpactoPotencial"][$i] == 2){
                    $data["ActivosPosiciones"][15]++;
                }else if($data["ImpactoPotencial"][$i] == 3 || $data["ImpactoPotencial"][$i] == 4){
                    $data["ActivosPosiciones"][16]++;
                }else if($data["ImpactoPotencial"][$i] == 5 || $data["ImpactoPotencial"][$i] == 6){
                    $data["ActivosPosiciones"][17]++;
                }else if($data["ImpactoPotencial"][$i] == 7 || $data["ImpactoPotencial"][$i] == 8){
                    $data["ActivosPosiciones"][18]++;
                }else if($data["ImpactoPotencial"][$i] == 9){
                    $data["ActivosPosiciones"][19]++;
                }
            }else if($data["Frecuencia"][$i] == 100){
                if($data["ImpactoPotencial"][$i] == 1 || $data["ImpactoPotencial"][$i] == 2){
                    $data["ActivosPosiciones"][20]++;
                }else if($data["ImpactoPotencial"][$i] == 3 || $data["ImpactoPotencial"][$i] == 4){
                    $data["ActivosPosiciones"][21]++;
                }else if($data["ImpactoPotencial"][$i] == 5 || $data["ImpactoPotencial"][$i] == 6){
                    $data["ActivosPosiciones"][22]++;
                }else if($data["ImpactoPotencial"][$i] == 7 || $data["ImpactoPotencial"][$i] == 8){
                    $data["ActivosPosiciones"][23]++;
                }else if($data["ImpactoPotencial"][$i] == 9){
                    $data["ActivosPosiciones"][24]++;
                }
            }

        }


        for ($i = 0; $i < count($data["ImpactoResidual"]); $i++){
            
            if($data["Frecuencia"][$i] == 0.01){
                if($data["ImpactoResidual"][$i] >= 0 && $data["ImpactoResidual"][$i] <= 2){
                    $data["ActivosMPDespues"][0]++;
                }else if($data["ImpactoResidual"][$i] > 2 && $data["ImpactoResidual"][$i] <= 4){
                    $data["ActivosMPDespues"][1]++;
                }else if($data["ImpactoResidual"][$i] > 4 && $data["ImpactoResidual"][$i] <= 6){
                    $data["ActivosMPDespues"][2]++;
                }else if($data["ImpactoResidual"][$i] > 6 && $data["ImpactoResidual"][$i] <= 8){
                    $data["ActivosMPDespues"][3]++;
                }else if($data["ImpactoResidual"][$i] > 8 && $data["ImpactoResidual"][$i] <= 9){
                    $data["ActivosMPDespues"][4]++;
                }
            }else if($data["Frecuencia"][$i] == 0.1){
                if($data["ImpactoResidual"][$i] >= 0 && $data["ImpactoResidual"][$i] <= 2){
                    $data["ActivosMPDespues"][5]++;
                }else if($data["ImpactoResidual"][$i] > 2 && $data["ImpactoResidual"][$i] <= 4){
                    $data["ActivosMPDespues"][6]++;
                }else if($data["ImpactoResidual"][$i] > 4 && $data["ImpactoResidual"][$i] <= 6){
                    $data["ActivosMPDespues"][7]++;
                }else if($data["ImpactoResidual"][$i] > 6 && $data["ImpactoResidual"][$i] <= 8){
                    $data["ActivosMPDespues"][8]++;
                }else if($data["ImpactoResidual"][$i] > 8 && $data["ImpactoResidual"][$i] <= 9){
                    $data["ActivosMPDespues"][9]++;
                }
            }else if($data["Frecuencia"][$i] == 1){
                if($data["ImpactoResidual"][$i] >= 0 && $data["ImpactoResidual"][$i] <= 2){
                    $data["ActivosMPDespues"][10]++;
                }else if($data["ImpactoResidual"][$i] > 2 && $data["ImpactoResidual"][$i] <= 4){
                    $data["ActivosMPDespues"][11]++;
                }else if($data["ImpactoResidual"][$i] > 4 && $data["ImpactoResidual"][$i] <= 6){
                    $data["ActivosMPDespues"][12]++;
                }else if($data["ImpactoResidual"][$i] > 6 && $data["ImpactoResidual"][$i] <= 8){
                    $data["ActivosMPDespues"][13]++;
                }else if($data["ImpactoResidual"][$i] > 8 && $data["ImpactoResidual"][$i] <= 9){
                    $data["ActivosMPDespues"][14]++;
                }
            }else if($data["Frecuencia"][$i] == 10){
                if($data["ImpactoResidual"][$i] >= 0 && $data["ImpactoResidual"][$i] <= 2){
                    $data["ActivosMPDespues"][15]++;
                }else if($data["ImpactoResidual"][$i] > 2 && $data["ImpactoResidual"][$i] <= 4){
                    $data["ActivosMPDespues"][16]++;
                }else if($data["ImpactoResidual"][$i] > 4 && $data["ImpactoResidual"][$i] <= 6){
                    $data["ActivosMPDespues"][17]++;
                }else if($data["ImpactoResidual"][$i] > 6 && $data["ImpactoResidual"][$i] <= 8){
                    $data["ActivosMPDespues"][18]++;
                }else if($data["ImpactoResidual"][$i] > 8 && $data["ImpactoResidual"][$i] <= 9){
                    $data["ActivosMPDespues"][19]++;
                }
            }else if($data["Frecuencia"][$i] == 100){
                if($data["ImpactoResidual"][$i] >= 0 && $data["ImpactoResidual"][$i] <= 2){
                    $data["ActivosMPDespues"][20]++;
                }else if($data["ImpactoResidual"][$i] > 2 && $data["ImpactoResidual"][$i] <= 4){
                    $data["ActivosMPDespues"][21]++;
                }else if($data["ImpactoResidual"][$i] > 4 && $data["ImpactoResidual"][$i] <= 6){
                    $data["ActivosMPDespues"][22]++;
                }else if($data["ImpactoResidual"][$i] > 6 && $data["ImpactoResidual"][$i] <= 8){
                    $data["ActivosMPDespues"][23]++;
                }else if($data["ImpactoResidual"][$i] > 8 && $data["ImpactoResidual"][$i] <= 9){
                    $data["ActivosMPDespues"][24]++;
                }
            }

        }

        foreach ($data["ActivosPosiciones"] as $key => $value) {
            if($data["ActivosPosiciones"][$key]==0){
              $data["ActivosPosiciones"][$key]="";
            }
        }
        foreach ($data["ActivosMPDespues"] as $key => $value) {
            if($data["ActivosMPDespues"][$key]==0){
              $data["ActivosMPDespues"][$key]="";
            }
        }

        require_once "views/Activos/viewMP.php";
    }

}
?>