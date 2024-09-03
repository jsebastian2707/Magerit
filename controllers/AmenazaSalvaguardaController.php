<?php

class AmenazaSalvaguardaController{

    public function __construct(){
        require_once "models/AmenazaSalvaguarda.php";
        require_once "models/Activo.php";
    }

    public function index(){
        $activo = new Activo();
        $data["titulo"] = "Listado de Activos";
        $data["Activos"] = $activo->listarActivos();

        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $data["AmenazasSalvaguardas"] = $AmenazaSalvaguarda->listarAmenazasSalvaguardas();
        $data["TieneAmenazaSalvaguarda"] = false;
        $data["Contador"] = 0;
        // Cargar la vista
        require_once "views/activos/index.php";
    }

    // Mostrar la vista para crear el registro (Cliente)
    public function insert(){

        $Activo = new Activo();
        $data['titulo'] = "REGISTRAR AMENAZA Y SALVAGUARDA";
        $data['Activos'] = $Activo->listarSoloActivos();
        
        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $data["TipoAmenazas"] = $AmenazaSalvaguarda->listarTiposAmenazas();
        $data["Amenazas"] = $AmenazaSalvaguarda->listarAmenazas();
        $data["TipoSalvaguardas"] = $AmenazaSalvaguarda->listarTiposSalvaguardas();
        $data["Salvaguardas"] = $AmenazaSalvaguarda->listarSalvaguardas();
        $data["Probabilidad"] = $AmenazaSalvaguarda->listarProbabilidad();
        $data["Proteccion"] = $AmenazaSalvaguarda->listarProteccion();

        require_once "views/amenazaSalvaguarda/insert.php";
    }

    // Guardar la informacion en la base de datos
    public function store(){

        // Recibir los datos del formulario
        $idActivo = $_POST['idActivo'];
        $idTipoAmenaza = $_POST['idTipoAmenaza'];
        $idAmenaza = $_POST['Amenazas'];

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
        $idTipoSalvaguarda = $_POST['idSalvaguarda'];
        $Salvaguarda = $_POST['Salvaguarda'];
        $Proteccion = $_POST['Proteccion'];

        // Guardar el registro
        $AmenazaSalvaguarda = new AmenazaSalvaguarda();
        $idAmenaza = $AmenazaSalvaguarda->insertarAmenaza($idTipoAmenaza,$probabilidad,$idAmenaza,$confidencialidadAmenaza,$integridadAmenaza,$disponibilidadAmenaza);
        $AmenazaSalvaguarda->insertarActivoAmenaza($idActivo, $idAmenaza);
        
        $idSalvaguarda = $AmenazaSalvaguarda->insertarSalvaguarda($idTipoSalvaguarda,$Proteccion,$Salvaguarda);
        $AmenazaSalvaguarda->insertarSalvaguardaAmenaza($idAmenaza, $idSalvaguarda);
        $this->index();
    }   

}
?>