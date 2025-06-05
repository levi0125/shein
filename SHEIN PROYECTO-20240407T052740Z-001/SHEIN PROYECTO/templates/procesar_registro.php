<?php 
    include("conexion.php");
    include("direccion.php");
    // Verificar si se recibieron los datos del formulario
    if (!isset($_REQUEST["nombre"]) || !isset($_REQUEST["telefono"]) || !isset($_REQUEST["correo"]) || !isset($_REQUEST["edad"]) || !isset($_REQUEST["password"])) {
        die("Faltan datos");
    }
    $nombre = $_REQUEST["nombre"];
    $telefono = $_REQUEST["telefono"];
    $correo = $_REQUEST["correo"];
    $edad = $_REQUEST["edad"];
    $psw = $_REQUEST["password"];
    
    if (!$psw) {
        die("Faltan datos");
    }
    // Validar que los datos no estén vacíos
    if(empty($nombre) || empty($telefono) || empty($correo) || empty($edad) || empty($psw)){
        die("Faltan datos");
    }
    // Validar que el correo tenga un formato correcto
    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        die("El correo no es válido");
    }
    $result=$conexion->query("select * from clientes where correo='$correo';");
    if($result->num_rows > 0){
        die("El correo ya está registrado");
    }
    // Hashear la contraseña antes de guardarla
    $hashed_password = password_hash($psw, PASSWORD_DEFAULT);

    // Validar los datos recibidos
    // $query="insert into clientes (nombre,telefono,correo,edad,psw) values ('$nombre','$telefono','$correo',$edad,'$psw')";
    $query="insert into clientes (nombre,telefono,correo,edad,psw) values ('$nombre','$telefono','$correo',$edad,'$hashed_password')";+
    
    $result=$conexion->query($query);

    if($result){
        $user_id= $conexion->query("select last_insert_id();");
        
        $user_id = $user_id->fetch_row()[0] // Obtener el último ID insertado"
        or die("Error al obtener el ID del usuario");
        // Obtener los datos del usuario recién registrado
        $result = $conexion->query("select * from clientes where id=$user_id;");

        $user = $result->fetch_assoc();
        include("session.php");
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nombre"] = $user["nombre"];
        
        header( "Location:/$direccion/templates/INICIO.php");
    }else{
        echo "NO se pudo hacer el registro";
    }

?>