<?php

require_once '../datos/Conexion.clase.php';

class Turismo extends Conexion {
    
    public function listar() {
        try {
            $sql = "select d.codigo_destino, d.descripcion,d.horario,d.costo,c.nombre as categoria from destino_turismo d inner join categoria c on (d.codigo_categoria = c.codigo_categoria)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function obtenerFoto($codigodestino){
        
           $foto="../imagenes/".$codigodestino;
    
    if(file_exists($foto.".png")){
        $foto=$foto.".png";
        
    }else if(file_exists($foto.".PNG")){
        $foto=$foto.".PGN";
        
    }else if(file_exists($foto.".jpg")){
        $foto=$foto.".jpg";
        
    }else if(file_exists($foto.".JPG")){
        $foto=$foto.".JPG";
        
    }else{
        $foto="none";
    }
    
    if ($foto=="none"){
        
        return $foto;
    }else{
        return Funciones::$DIRECCION_WEB_SERVICE.$foto;
    }
 
    }
    
    
    
    
}
