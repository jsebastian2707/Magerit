<?php
class AmenazaSalvaguarda{
    

    // Atributos
    private $db;
    private $amenazasSalvaguardas;
    private $listaAmenazas;
    private $listaTiposSalvaguardas;
    private $amenazas;
    private $salvaguardas;
    private $probabilidad;
    private $proteccion;

    // Constructor
    public function __construct(){
        
        $this->db = Conexion::conectar();
        $this->amenazasSalvaguardas = [];
        $this->listaTiposAmenazas = [];
        $this->listaTiposSalvaguardas = [];
        $this->amenazas = [];
        $this->salvaguardas = [];
        $this->probabilidad = [];
        $this->proteccion = [];
    }

    // Metodos
    public function listarAmenazasSalvaguardas(){
        
        $sql = "SELECT activo.activo, amenazaactivo.idActivo, amenazas.amenaza,
        tipoamenaza.tipoAmenaza, amenaza.idAmenaza, amenaza.confidencialidad,
        amenaza.integridad, amenaza.disponibilidad, probabilidad.probabilidad, probabilidad.valor, salvaguarda.idSalvaguarda,
        tiposalvaguarda.tipoSalvaguarda, salvaguardas.salvaguarda, proteccion.nivel, proteccion.proteccion
        FROM activo 
        INNER JOIN tipoactivo ON (tipoactivo.idTipoActivo = activo.idTipoActivo)
        INNER JOIN amenazaactivo ON (activo.idActivo = amenazaactivo.idActivo)
        INNER JOIN amenaza ON (amenazaactivo.idAmenaza = amenaza.idAmenaza)
        INNER JOIN probabilidad ON (amenaza.idProbabilidad = probabilidad.idProbabilidad)
        INNER JOIN amenazas ON (amenazas.idAmenazas = amenaza.amenaza)
        INNER JOIN tipoamenaza ON (amenazas.idTipoAmenaza = tipoamenaza.idTipoAmenaza)
        INNER JOIN amenazasalvaguarda ON (amenaza.idAmenaza = amenazasalvaguarda.idAmenaza)
        INNER JOIN salvaguarda ON (amenazasalvaguarda.idSalvaguarda = salvaguarda.idSalvaguarda)
        INNER JOIN salvaguardas ON (salvaguarda.salvaguarda = salvaguardas.idSalvaguardas)
        INNER JOIN tiposalvaguarda ON (salvaguarda.idTipoSalvaguarda = tiposalvaguarda.idTipoSalvaguarda)
        INNER JOIN proteccion ON (proteccion.idProteccion = salvaguarda.idProteccion) ORDER BY amenazaactivo.idActivo";
        
        // Ejecutando la consulta
        $resultado = $this->db->query($sql);

        // Si falla la consulta
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        // Lee cada fila del resultado
        while($row = $resultado->fetch_assoc()){
            
            // Agrega las filas al Activo 
            $this->amenazasSalvaguardas[] = $row;
        }

        return $this->amenazasSalvaguardas;
    }

    public function listarTiposAmenazas(){

        $sql = "SELECT * FROM tipoamenaza";
        
        $resultado = $this->db->query($sql);
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        while($row = $resultado->fetch_assoc()){
            $this->listaTiposAmenazas[] = $row;
        }
        return $this->listaTiposAmenazas;
    }

    public function listarAmenazas(){
        
        $sql = "SELECT * FROM amenazas";
        
        $resultado = $this->db->query($sql);
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        while($row = $resultado->fetch_assoc()){
            $this->amenazas[] = $row;
        }
        return $this->amenazas;
    }

    public function listarTiposSalvaguardas(){
        
        $sql = "SELECT * FROM tiposalvaguarda";
        
        $resultado = $this->db->query($sql);
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        while($row = $resultado->fetch_assoc()){
            $this->listaTiposSalvaguardas[] = $row;
        }
        return $this->listaTiposSalvaguardas;
    }

    public function listarSalvaguardas(){
        
        $sql = "SELECT * FROM salvaguardas";
        
        $resultado = $this->db->query($sql);
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        while($row = $resultado->fetch_assoc()){
            $this->salvaguardas[] = $row;
        }
        return $this->salvaguardas;
    }

    public function listarProbabilidad(){
        
        $sql = "SELECT * FROM probabilidad";
        
        $resultado = $this->db->query($sql);
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        while($row = $resultado->fetch_assoc()){
            $this->probabilidad[] = $row;
        }
        return $this->probabilidad;
    }

    public function listarProteccion(){
        
        $sql = "SELECT * FROM proteccion";
        
        $resultado = $this->db->query($sql);
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        while($row = $resultado->fetch_assoc()){
            $this->proteccion[] = $row;
        }
        return $this->proteccion;
    }

    public function insertarAmenaza($idTipoAmenaza, $idProbabilidad, $amenaza, $confidencialidad, $integridad, $disponibilidad){
        // Preparar la consulta de inserción
        $sql = "INSERT INTO amenaza(idTipoAmenaza, idProbabilidad, amenaza, confidencialidad, integridad, disponibilidad) 
            VALUES ($idTipoAmenaza, $idProbabilidad, $amenaza, $confidencialidad, $integridad, $disponibilidad)";
        
        // Ejecutar la consulta de inserción
        $this->db->query($sql);
    
        // Obtener el ID del último registro insertado
        $idAmenaza = $this->db->insert_id;
    
        return $idAmenaza;
    }

    public function insertarActivoAmenaza($idActivo, $idAmenaza){

        $sql = "INSERT INTO amenazaactivo(idActivo, idAmenaza) VALUES ($idActivo, $idAmenaza)";
        
        $this->db->query($sql);
    }

    public function insertarSalvaguarda($idTipoSalvaguarda, $idProteccion, $idSalvaguarda){
        // Preparar la consulta de inserción
        $sql = "INSERT INTO salvaguarda(idTipoSalvaguarda, idProteccion, salvaguarda) 
            VALUES ($idTipoSalvaguarda, $idProteccion, $idSalvaguarda)";
        // Ejecutar la consulta de inserción
        $this->db->query($sql);
    
        // Obtener el ID del último registro insertado
        $idSalvaguarda = $this->db->insert_id;
    
        return $idSalvaguarda;
    }

    public function insertarSalvaguardaAmenaza($idAmenaza, $idSalvaguarda){

        $sql = "INSERT INTO amenazasalvaguarda(idAmenaza, idSalvaguarda) VALUES ($idAmenaza, $idSalvaguarda)";
        $this->db->query($sql);
    }


    //Obtener la informacion de la Amenaza y el Salvaguarda
    public function getAmenazaSalvaguarda($idActivo, $idAmenaza, $idSalvaguarda){

        $sql = "SELECT amenazas.amenaza, amenaza.amenaza, amenaza.idAmenaza, tipoamenaza.idTipoAmenaza, tipoamenaza.tipoAmenaza, amenaza.confidencialidad,
        amenaza.integridad, amenaza.disponibilidad, probabilidad.idProbabilidad, probabilidad.probabilidad, 
        tiposalvaguarda.idTipoSalvaguarda, tiposalvaguarda.tipoSalvaguarda, salvaguardas.salvaguarda, salvaguarda.idSalvaguarda, salvaguarda.salvaguarda,
        proteccion.idProteccion, proteccion.nivel, proteccion.proteccion
        FROM activo 
        INNER JOIN tipoactivo ON (tipoactivo.idTipoActivo = activo.idTipoActivo)
        INNER JOIN amenazaactivo ON (activo.idActivo = amenazaactivo.idActivo)
        INNER JOIN amenaza ON (amenazaactivo.idAmenaza = amenaza.idAmenaza)
        INNER JOIN probabilidad ON (amenaza.idProbabilidad = probabilidad.idProbabilidad)
        INNER JOIN amenazas ON (amenazas.idAmenazas = amenaza.amenaza)
        INNER JOIN tipoamenaza ON (amenazas.idTipoAmenaza = tipoamenaza.idTipoAmenaza)
        INNER JOIN amenazasalvaguarda ON (amenaza.idAmenaza = amenazasalvaguarda.idAmenaza)
        INNER JOIN salvaguarda ON (amenazasalvaguarda.idSalvaguarda = salvaguarda.idSalvaguarda)
        INNER JOIN salvaguardas ON (salvaguarda.salvaguarda = salvaguardas.idSalvaguardas)
        INNER JOIN tiposalvaguarda ON (salvaguarda.idTipoSalvaguarda = tiposalvaguarda.idTipoSalvaguarda)
        INNER JOIN proteccion ON (proteccion.idProteccion = salvaguarda.idProteccion) WHERE activo.idActivo = $idActivo AND amenaza.idAmenaza = $idAmenaza AND salvaguarda.idSalvaguarda = $idSalvaguarda";

        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }


    // Actualizar la amenaza
    public function updateAmenaza($idAmenaza, $idTipoAmenaza, $idProbabilidad, $amenaza, $confidencialidadAmenaza, $integridadAmenaza, $disponibilidadAmenaza){

        $sql = "UPDATE amenaza 
        SET idTipoAmenaza=$idTipoAmenaza,idProbabilidad=$idProbabilidad,amenaza=$amenaza,
        confidencialidad=$confidencialidadAmenaza,`integridad`=$integridadAmenaza,disponibilidad=$disponibilidadAmenaza 
        WHERE idAmenaza=$idAmenaza";
        
        $this->db->query($sql);
    }


    // Actualizar el Salvaguarda
    public function updateSalvaguarda($idSalvaguarda, $idTipoSalvaguarda, $idProteccion, $salvaguarda){

        $sql = "UPDATE salvaguarda
        SET idTipoSalvaguarda=$idTipoSalvaguarda, idProteccion=$idProteccion, salvaguarda=$salvaguarda 
        WHERE idSalvaguarda=$idSalvaguarda";

        $this->db->query($sql);
    }


    // Eliminar una Amenaza
    public function deleteAmenaza($idAmenaza){
        
        $sql = "DELETE FROM amenaza 
            WHERE idAmenaza=$idAmenaza";
        $this->db->query($sql);
    }

    // Eliminar un Salvaguarda
    public function deleteSalvaguarda($idSalvaguarda){
        
        $sql = "DELETE FROM salvaguarda 
            WHERE idSalvaguarda=$idSalvaguarda";
        $this->db->query($sql);
    }


    // Mapa de calor
    public function listarDatosMP(){
        
        $sql = "SELECT activo.idActivo, activo.activo,
        amenaza.confidencialidad, amenaza.integridad, amenaza.disponibilidad,
        probabilidad.probabilidad, probabilidad.valor, 
        proteccion.nivel, proteccion.proteccion
        FROM activo 
        INNER JOIN tipoactivo ON (tipoactivo.idTipoActivo = activo.idTipoActivo)
        INNER JOIN amenazaactivo ON (activo.idActivo = amenazaactivo.idActivo)
        INNER JOIN amenaza ON (amenazaactivo.idAmenaza = amenaza.idAmenaza)
        INNER JOIN probabilidad ON (amenaza.idProbabilidad = probabilidad.idProbabilidad)
        INNER JOIN amenazas ON (amenazas.idAmenazas = amenaza.amenaza)
        INNER JOIN tipoamenaza ON (amenazas.idTipoAmenaza = tipoamenaza.idTipoAmenaza)
        INNER JOIN amenazasalvaguarda ON (amenaza.idAmenaza = amenazasalvaguarda.idAmenaza)
        INNER JOIN salvaguarda ON (amenazasalvaguarda.idSalvaguarda = salvaguarda.idSalvaguarda)
        INNER JOIN salvaguardas ON (salvaguarda.salvaguarda = salvaguardas.idSalvaguardas)
        INNER JOIN tiposalvaguarda ON (salvaguarda.idTipoSalvaguarda = tiposalvaguarda.idTipoSalvaguarda)
        INNER JOIN proteccion ON (proteccion.idProteccion = salvaguarda.idProteccion)";
        
        // Ejecutando la consulta
        $resultado = $this->db->query($sql);

        // Si falla la consulta
        if(!$resultado){
            echo "Lo sentimos, este sitio esta experimentando problemas";
            exit;
        }   
    
        // Lee cada fila del resultado
        while($row = $resultado->fetch_assoc()){
            
            // Agrega las filas al Activo 
            $this->amenazasSalvaguardas[] = $row;
        }

        return $this->amenazasSalvaguardas;
    }

}

?>