<ul>
    <li><a href="INICIO.php">INCIO</a></li>
    <li><a href="MUJER.php"> MUJER</a></li>
    <li><a href="HOMBRE.php">HOMBRE</a></li>
    
    <?php
        include("session.php");
        
        if (isset($_SESSION["user_id"])) {
            //sesion iniciada
            echo "<li><a href='CARRITO.php'>🛒</a></li>";
            echo "<li><a href='logout.php'>CERRAR SESION</a></li>";
        }else{
            echo "<li><a href='REGISTRO.php'>RESGISTRO</a></li>";
            echo "<li><a href='login.php'>INICIAR SESION</a></li>";
        }
    ?>
</ul>