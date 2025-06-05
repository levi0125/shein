<?php 
    include("conexion.php");
    include("direccion.php");
    // Verificar si se recibieron los datos del formulario
    if (!isset($_REQUEST["correo"]) || !isset($_REQUEST["password"])) {
        die("Faltan datos");
    }
    $correo = $_REQUEST["correo"];
    $psw = $_REQUEST["password"];
    
    if (!$psw) {
        die("Faltan datos");
    }
    // Validar que los datos no estén vacíos
    if(empty($correo) || empty($psw)){
        die("Faltan datos");
    }
    // Validar que el correo tenga un formato correcto
    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        die("El correo no es válido");
    }
    $result=$conexion->query("select * from clientes where correo='$correo';");
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        // Verificar la contraseña
        if($psw == $user['psw'] ) {
            include("session.php");
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["nombre"] = $user["nombre"];
            header( "Location:/$direccion/templates/INICIO.php");
            exit();
        // if(password_verify($psw, $user['psw'])) {
        //     include("session.php");
        //     $_SESSION["user_id"] = $user["id"];
        //     $_SESSION["nombre"] = $user["nombre"];
        //     header( "Location:/$direccion/templates/INICIO.php");
        //     exit();
        } else {
            die("Contraseña incorrecta");
        }
    } else {
        die("El correo no está registrado");
    }
    // Si el correo no está registrado, mostrar un mensaje de error
    echo "El correo no está registrado";

?>