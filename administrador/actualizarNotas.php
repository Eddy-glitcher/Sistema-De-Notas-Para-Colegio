<?php 
    
    $consulta= "SELECT `Pers_Nombre` FROM `Personas`";
    $notas="SELECT `Not_Nota` FROM `notas`";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="matematicas.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../img/backpack.png" type="image/x-icon">

</head>
<body>

<?php
    include("../conexion.php");
    $conec = conectar();
    $Ideditar = $_GET['editar'];
    $sql= "SELECT CONCAT(P.Pers_Nombre,' ',P.Pers_Apellido) As nombre, M.Mat_Nombre, N.* FROM notas AS N INNER JOIN personas as P ON N.Not_PerId = P.Pers_Id INNER JOIN materias AS M ON N.Not_MatId = M.Mat_Id WHERE N.Not_Id= '$Ideditar'";
        $datos = $conec->query($sql);
        foreach ($datos as $datos1) {
            $IDestudiante = $datos1['Not_PerId'];
            $Nombreestudiante = $datos1['nombre'];
            $Idmateria = $datos1['Not_MatId'];
            $materia = $datos1['Mat_Nombre'];
            $nota1 = $datos1['Not_Nota1'];
            $nota2 = $datos1['Not_Nota2'];
            $nota3 = $datos1['Not_Nota3'];

            $resultado = $datos1['Not_Promedio'];

        }
    

    ?>
<div class="container">
        <center><div class="name"><h3>Alumnos Clase Matemáticas</h3></div>
        <div class="notas">  
            <h3 class="titulo">Ingresar Notas</h3>         
               <form action="?notasA=<?php echo $Ideditar?>" method="POST">
                    <div class="tnotas">
                        <form action="">
                        
                        <div class="Info">
                        
                        <select name="estudiante" id="">
                            <option value="<?php echo $IDestudiante; ?>"><?php echo $Nombreestudiante; ?></option>
                            
                            <?php
                            $sql= "SELECT *, concat(personas.Pers_Nombre,'-',personas.Pers_Apellido) as nombreC FROM `personas` where Pers_Cargo='estudiante'";
                            $datos = $conec->query($sql);
                            foreach ($datos as $datos1) {
                                echo '<option value="'.$datos1['Pers_Id'].'">'.$datos1["nombreC"].'</option>';
                              
                            } 
                            ?>

                            
                        </select>

                        
                        <select name="materia" id="">
                            <option value="<?php echo $Idmateria;?>"><?php echo $materia;?></option>
                            <?php
                            $sql= "SELECT * FROM `materias`";
                            $datos = $conec->query($sql);
                            foreach ($datos as $datos1) {
                                echo '<option value="'.$datos1['Mat_Id'].'">'.$datos1["Mat_Nombre"].'</option>';
                              
                            } 
                            ?>
                        </select>
                        </div>

                        <label for="Nota1">Nota1:</label>
                        <input type="text" name="Nota1"  value="<?php echo $nota1; ?>">
                        <label for="Nota2">Nota2:</label>
                        <input type="text" name="Nota2" value="<?php echo $nota2; ?>">
                        <label for="Nota3">Nota3:</label>
                        <input type="text" name="Nota3" value="<?php echo $nota3; ?>"> <br><br>
                        <input type="submit" style=" width: 100px;" value="Actualizar">
                </form>
                    </div>    
        </div></center>

<?php



if(isset($_GET['notasA'])){
    $IdActualizar = $_GET['notasA'];
    $IDestudiante = $_POST['estudiante'];
    $Idmateria = $_POST['materia'];
    $nota1 = $_POST['Nota1'];
    $nota2 = $_POST['Nota2'];
    $nota3 = $_POST['Nota3'];

    $resultado = ($nota1*0.3)+($nota2*0.3)+($nota3*0.4);



    $insertar = "UPDATE notas SET Not_PerId = '$IDestudiante', Not_MatId = '$Idmateria', Not_Nota1 = '$nota1', Not_Nota2 = '$nota2',Not_Nota3 = '$nota3', Not_Promedio = '$resultado' WHERE Not_Id = '$IdActualizar'";

    $ejecutarInsert = mysqli_query( $conec,$insertar);
    if($ejecutarInsert){
        echo "<script>alert('Notas Actualizadas')
        </script>";
        }else{
            echo "<script>alert('Error no se pudo Actualizar las Notas')
            </script>";
        }
    echo "<script>
            setTimeout(() => {
            window.open('notas.php','_self')
            },10);
        </script>";/*temporizador para recargar pagina*/

}
?>
</body>
</html>



              