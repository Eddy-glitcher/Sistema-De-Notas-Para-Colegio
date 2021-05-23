<?php
function conectar(){
    $conexion = mysqli_connect("127.0.0.1", "root",''/*contraseña*/,"colegio");
    $conexion -> set_charset("utf8");
    return $conexion;
}
?>