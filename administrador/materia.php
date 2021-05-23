<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materia</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/backpack.png" type="image/x-icon">
    <link rel="shortcut icon" href="../img/backpack.png" type="image/x-icon">


</head>
<body>
    <?php
    include("../conexion.php");
    $conec = conectar();
    $sql= "SELECT * FROM `materias`";
    $datos = $conec->query($sql);
    foreach ($datos as $datos1) {
        echo $datos1["Mat_Nombre"];
    }
    ?>
    
</body>
</html>