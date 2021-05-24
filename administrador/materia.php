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
  
    

    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Notas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link active" href="indexAdmin.php">Inicio
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../cerrar.php">Cerrar
            <span class="visually-hidden">(current)</span>
          </a>
        </li>   
 
    </ul> 
      
    </div>
  </div>
</nav>
<div class="container">
        <center><div class="name"><h3>Alumnos Clase Matemáticas</h3></div>
        <div class="notas">  
            <h3 class="titulo">Ingresar Notas</h3>         
               <form action="?notasC" method="POST">
                    <div class="tnotas">
                        <form action="">
                        
                        <div class="Info">
                        
                        <select name="estudiante" id="">
                            <option value="NULL">Nombre Estudiante:</option>
                            
                            <?php
                            $sql= "SELECT *, concat(personas.Pers_Nombre,'-',personas.Pers_Apellido) as nombreC FROM `personas` where Pers_Cargo='estudiante'";
                            $datos = $conec->query($sql);
                            foreach ($datos as $datos1) {
                                echo '<option value="'.$datos1['Pers_Id'].'">'.$datos1["nombreC"].'</option>';
                              
                            } 
                            ?>

                            
                        </select>

                        
                        <select name="materia" id="">
                            <option value="NULL">Seleccionar Materia</option>
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
                        <input type="text" name="Nota1">
                        <label for="Nota2">Nota2:</label>
                        <input type="text" name="Nota2">
                        <label for="Nota3">Nota3:</label>
                        <input type="text" name="Nota3"> <br><br>
                        <input type="submit" style="    width: 100px;" value="Ingresar">
                </form>
                    </div>    
        </div></center>

<?php
if(isset($_GET['notasC'])){
    $IDestudiante = $_POST['estudiante'];
    $Idmateria = $_POST['materia'];
    $nota1 = $_POST['Nota1'];
    $nota2 = $_POST['Nota2'];
    $nota3 = $_POST['Nota3'];

    $resultado = ($nota1*0.3)+($nota2*0.3)+($nota3*0.4);
    $insertar = "INSERT notas(Not_PerId,Not_MatId,Not_Nota1,Not_Nota2,Not_Nota3,Not_Promedio) VALUES ('$IDestudiante','$Idmateria','$nota1','$nota2','$nota3','$resultado')";
            $ejecutarInsert = mysqli_query( $conec,$insertar);
            if($ejecutarInsert){
                echo "<script>alert('Proceso Exitoso')
                </script>";
            }else{
                echo "<script>alert('Error no se pudo insertar las Notas')
                </script>";
            }
            echo "<script>
                    setTimeout(() => {
                    window.open('notas.php','_self')
                    },10);
                </script>";/*temporizador para recargar pagina*/

}
?>

<section class="mostrar">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ESTUDIANTE</th>
      <th scope="col">MATERIA</th>
      <th scope="col">NOTA (30%)</th>
      <th scope="col">NOTA (30%)</th>
      <th scope="col">NOTA (40%)</th>
      <th scope="col">NOTA FINAL</th>
      <th scope="col">FECHA CREACIÓN</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
    
        <?php
        $sql= 'SELECT CONCAT(P.Pers_Nombre," ",P.Pers_Apellido) As nombre, M.Mat_Nombre, N.* FROM notas AS N INNER JOIN personas as P ON N.Not_PerId = P.Pers_Id INNER JOIN materias AS M ON N.Not_MatId = M.Mat_Id;';
        $datos = $conec->query($sql);
        foreach ($datos as $datos1) {
            
            echo '
            <tr class="table-info">
                <th scope="row">'.$datos1['nombre'].'</th>
                <td>'.$datos1['Mat_Nombre'].'</td>
                <td>'.$datos1['Not_Nota1'].'</td>
                <td>'.$datos1['Not_Nota2'].'</td>
                <td>'.$datos1['Not_Nota3'].'</td>
                <td>'.$datos1['Not_Promedio'].'</td>
                <td>'.$datos1['Not_FechaCrea'].'</td>
                <td><a href="actualizarNotas.php?editar='.$datos1['Not_Id'].'">Actualizar</a> <a href="?borrar='.$datos1['Not_Id'].'">Eliminar</a></td>
            </tr>
            ';
            
        } 
        ?>
     
    
  </tbody>
</table>


</section>
<?php
if(isset($_GET['borrar'])){
    $idB = $_GET['borrar'];
    $insertar = "DELETE FROM notas WHERE Not_Id = '$idB'";
    $ejecutarInsert = mysqli_query( $conec,$insertar);
    if($ejecutarInsert){
        echo "<script>alert('Notas Eliminada')
        </script>";
        }else{
            echo "<script>alert('Error no se pudo Eliminar las Notas')
            </script>";
        }
    echo "<script>
            setTimeout(() => {
            window.open('notas.php','_self')
            },10);
        </script>";/*temporizador para recargar pagina*/

}

if(isset($_GET['editar'])){
    $Ideditar = $_GET['editar'];
    $sql= "SELECT * FROM `materias` WHERE Mat_Id= '$Ideditar'";
        $datos = $conec->query($sql);
        foreach ($datos as $datos1) {

            
            echo '
            <center>
            <div>
                <form action="?ActualizarMateria='.$Ideditar.'" method="post">
                <h2>Crear Materia</h2>
                <div class="form-group">
                    <input style="width: 350px;" type="text" name="materiaA" class="form-control" value="'.$datos1["Mat_Nombre"].'" required id="inputDefault">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </center>
            ';
        }
}
if(isset($_GET['ActualizarMateria'])){
    $IdActualizar = $_GET['ActualizarMateria'];
    $materiaA = $_POST['materiaA'];
    $insertar = "UPDATE materias SET Mat_Nombre = '$materiaA' WHERE Mat_Id = '$IdActualizar'";
    $ejecutarInsert = mysqli_query( $conec,$insertar);
    if($ejecutarInsert){
        echo "<script>alert('Materia Actualizada')
        </script>";
        }else{
            echo "<script>alert('Error no se pudo Actualizar la materia')
            </script>";
        }
    echo "<script>
            setTimeout(() => {
            window.open('materia.php','_self')
            },10);
        </script>";/*temporizador para recargar pagina*/

}
?>
</body>
</html>



              