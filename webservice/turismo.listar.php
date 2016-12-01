<?php

require_once '../negocio/turismo.clase.php';
require_once '../util/funciones/Funciones.clase.php';

try { 
        
        $obj= new Turismo();
        
        $resultado=$obj->listar();
        
        $listaArticulo=array();
        
        for($i=0; $i<count($resultado); $i++){
            //obtener foto del articulo
            $foto=$obj->obtenerFoto($resultado[$i]["codigo_destino"]);
            //
            $datosArticulo=array
            (
            "codigo"=>$resultado[$i]["codigo_destino"],
            "descripcion"=>$resultado[$i]["descripcion"],
            "horario"=>$resultado[$i]["horario"],
            "costo"=>$resultado[$i]["costo"],
            "categoria"=>$resultado[$i]["categoria"],
            "foto"=>$foto
             );
 
        $listaArticulo[$i]=$datosArticulo;
    }
        Funciones::imprimeJSON(200,"", $listaArticulo );
    
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}