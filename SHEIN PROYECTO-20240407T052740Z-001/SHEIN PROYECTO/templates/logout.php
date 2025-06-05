<?php
    include("direccion.php");
    include("session.php");
    session_destroy();
    header( "Location:/$direccion/templates/REGISTRO.php");
?>