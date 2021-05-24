<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Principal Estudiante</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/backpack.png" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Administrador</a>
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
</nav>
<section><br>
    <center><h1>Advanced School</h1></center>
    <div class="menu">
        <a href="creaciousuario.php"><div class="alert alert-dismissible alert-info targeta">
            <img src="../img/user.png" alt="">
            <strong>Crear Usuario</strong> 
        </div></a>
        <a href="materia.php"><div class="alert alert-dismissible alert-info targeta">
            <img src="../img/libro.png" alt="">
            <strong>Materia</strong> 
        </div></a>
        <a href="notas.php"><div class="alert alert-dismissible alert-info targeta">
            <img src="../img/editar.png" alt="">
            <strong>Modificar Notas</strong> 
        </div></a>
        
    </div>

</section>
    
</body>
</html>