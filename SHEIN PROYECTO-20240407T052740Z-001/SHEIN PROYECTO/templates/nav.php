<ul>
    <li><a href="INICIO.php">Inicio PHP</a></li>
    <li><a href="MUJER.php"> MUJER</a></li>
    <li><a href="HOMBRE.php">HOMBRE</a></li>
    
    <?php
        include("session.php");
        
        if (isset($_SESSION["user_id"])) {
            //sesion iniciada
            echo "<li><a href='CARRITO.php'>🛒</a></li>";
            echo "<li><a href='logout.php'>Cerrar Sesion</a></li>";
        }else{
            echo "<li><a href='REGISTRO.php'>Registro</a></li>";
            echo "<li><a href='login.php'>Iniciar Sesion</a></li>";
        }
    ?>
</ul>