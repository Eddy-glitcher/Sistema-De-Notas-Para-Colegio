

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
  
    
    $IDuser = $_GET['user'];

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
          <a class="nav-link active" href="informe.php?user=<?php echo $IDuser; ?>">Imprimir Informe
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
        <center><div class="name"><h3>Notas</h3></div>
    </center>


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
    </tr>
  </thead>
  <tbody>
    
        <?php
        $sql= "SELECT CONCAT(P.Pers_Nombre,' ',P.Pers_Apellido) As nombre, M.Mat_Nombre, N.* FROM notas AS N INNER JOIN personas as P ON N.Not_PerId = P.Pers_Id INNER JOIN materias AS M ON N.Not_MatId = M.Mat_Id WHERE P.Pers_UsuId = $IDuser";
        
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
                
            </tr>
            ';
            
        } 
        ?>
     
    
  </tbody>
</table>


</section>

</body>
</html>



              