<?php 
    include("conexion.php");

    $nombre = $_REQUEST["nombre"];
    $telefono = $_REQUEST["telefono"];
    $correo = $_REQUEST["correo"];
    $edad = $_REQUEST["edad"];

    $query="insert into clientes (nombre,telefono,correo,edad) values ('$nombre','$telefono','$correo',$edad)";
    
    $result=$conexion->query($query);

    if($result){
        echo "Se ha hecho el registro";
        #header ("Location:/prueba");
    }else{
        echo "NO se pudo hacer el registro";
    }

?>