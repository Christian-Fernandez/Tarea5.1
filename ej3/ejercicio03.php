<?php
define("CADENA_CONEXION","mysql:dbname=pedidos;host=127.0.0.1");
define ("USUARIO_CONEXION","root");
define ("CLAVE_CONEXION","");

function  cargar_categorias(){
    try{
        $bd=new PDO(CADENA_CONEXION,USUARIO_CONEXION,CLAVE_CONEXION);

        $ins = "SELECT CodCat,Nombre FROM categoria";
        $resul = $bd->query($ins);

        if(!$resul){
            return FALSE;
        }
        if($resul->rowCount() === 0){
            return FALSE;
        }

        return $resul;
    }catch(PDOException $e){
        echo "Error con la base de datos:" . $e->getMessage();
    }
}

function  cargar_productos_categoria($codCat){
    try{
        $bd=new PDO(CADENA_CONEXION,USUARIO_CONEXION,CLAVE_CONEXION);

        $ins = "SELECT * FROM productos WHERE CodCat=$codCat";
        $resul = $bd->query($ins);

        if(!$resul){
            return FALSE;
        }
        if($resul->rowCount() === 0){
            return FALSE;
        }

        return $resul;
    }catch(PDOException $e){
        echo "Error con la base de datos:" . $e->getMessage();
    }

}

if(isset($_GET["prod"])){

    cargar_productos_categoria($_GET["prod"]);

}else{
    cargar_categorias();
}

