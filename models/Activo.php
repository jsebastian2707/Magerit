<?php
class Activo{
    

    // Atributos
    private $db;
    private $activos;
    private $tipoActivos;
   

    // Constructor
    public function __construct(){
        
        $this->db = Conexion::conectar();
        $this->activos = [];
        $this->tipoActivos = [];
    }
    // Metodos
    public function listarActivos(){
        
        $sql = "SELECT tipoactivo.tipoActivo, activo.idActivo, activo.activo, activo.confidencialidad, activo.disponibilidad, activo.integridad, activo.trazabilidad, activo.autenticidad, activo.valor
        FROM activo 
        INNER JOIN tipoactivo ON (tipoactivo.idTipoActivo = activo.idTipoActivo)";
        
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
            $this->activos[] = $row;
        }

        return $this->activos;
    }

    public function listarTipoActivos(){
        
        $sql = "SELECT * FROM tipoactivo";
        
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
            $this->tipoActivos[] = $row;
        }

        return $this->tipoActivos;
    }

    public function insert($nombreActivo, $idTipoActivo, $confidencialidadActivo, $integridadActivo, $disponibilidadActivo, $trazabilidadActivo, $autenticidadActivo, $valorActivo){

        $sql = "INSERT INTO activo(idTipoActivo, activo, confidencialidad, integridad, disponibilidad, trazabilidad, autenticidad, valor) 
        VALUES ($idTipoActivo,'$nombreActivo', '$confidencialidadActivo', '$integridadActivo', '$disponibilidadActivo', '$trazabilidadActivo', '$autenticidadActivo',$valorActivo)";

        $this->db->query($sql);
    }



    public function listarSoloActivos(){
        
        $sql = "SELECT idActivo, activo FROM activo";
        
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
            $this->activos[] = $row;
        }

        return $this->activos;
    }

    //Obtener la informacion de un Activo especifico
    public function getActivo($idActivo){

        $sql = "SELECT tipoactivo.idTipoActivo, tipoactivo.tipoActivo, activo.idActivo, activo.activo, activo.confidencialidad, activo.disponibilidad, activo.integridad, activo.trazabilidad, activo.autenticidad, activo.valor
        FROM activo 
        INNER JOIN tipoactivo ON (tipoactivo.idTipoActivo = activo.idTipoActivo)
        WHERE activo.idActivo = $idActivo";

        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    // Actualizar el Activo
    public function updateActivo($idActivo, $nombreActivo, $idTipoActivo, $confidencialidadActivo, $integridadActivo, $disponibilidadActivo, $trazabilidadActivo, $autenticidadActivo, $valorActivo){

        $sql = "UPDATE activo 
        SET idTipoActivo=$idTipoActivo,activo='$nombreActivo',confidencialidad='$confidencialidadActivo',integridad='$integridadActivo',
        disponibilidad='$disponibilidadActivo',trazabilidad='$trazabilidadActivo',autenticidad='$autenticidadActivo',valor=$valorActivo
        WHERE idActivo =$idActivo";

        $this->db->query($sql);
    }

    // Eliminar un Activo
    public function deleteActivo($id_Activo){
        
        $sql = "DELETE FROM Activo 
            WHERE idActivo=$id_Activo";
        $this->db->query($sql);
    }
    
}

?>