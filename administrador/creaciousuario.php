<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../img/backpack.png" type="image/x-icon">
    
</head>
<body style="background-color:#99ccff">


<?php
 include("../conexion.php");
 $conec = conectar();

?>
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

</ul>
      
    </div>
  </div>
</nav>
<CENter>
  
<h1> CREACION DE USUARIO</h1>
<form method="post" action="?creacion" >
    <div class="form-element">
        <label>Usuario</label><br>
        <input type="text" name="usuario" pattern="[a-zA-Z0-9]+" required /> <br>
    </div>
    <div class="form-element">
        <label>Email</label><br>
        <input type="email" name="email" required /> <br>
    </div>
    <br>
    <div class="form-element">
    
Contraseña: <br> <input type="password" name="clave1" size="20" id="contraseña">

<br> <br>

Repite contraseña: <br> <input type="password" name="clave2" size="20" id="contraseña2" onchange="validar()">

<br> <p id="validacion" style="font-size: 20px;
    color: red;
    font-weight: 700;"></p><br>

<br> <br>
</div>

    <div class="form-element">
        <label>nombre</label>
        <input type="text" name="nombre" pattern="[a-zA-Z0-9]+" required />
        <label>apellido</label>
        <input type="text" name="apellido"  required />
        <p>Fecha de nacimiento: <input type="date" name="fechaNacimiento"></p>
        <p>Identificacion: <input type="text" name="identificacion"></p>

        
        
        <p>

    cargo:

    <select name="cargo">


    <option value="administrador">administrador</option>   

      <option value="profesor">profesor</option>

      <option value="estudiante">estudiante</option>


    </select>


  </p>
  <p>

    sexo:

    <select name="sexo">


    <option value="masculino">masculino</option>   

      <option value="femenino">femenino</option>

      <option value="otros">otros</option>


    </select>
    </p>

    <p>

    RH:

    <select name="RH">
   
   <option value="O negativo">O negativo</option>

    <option value="  O positivo">  O positivo</option>   

      <option value="A negativo">A negativo</option>

      <option value="A positivo">A positivo</option>
       
       <option value="B negativo">B negativo</option>

       <option value="B positivo">B positivo</option>

       <option value="AB negativ0">AB negativo</option>
        
        <option value="AB positiv0">AB positivo</option>


    </select>
    <?php
echo "<script>swal('REGISTRO ACEPTADO',':)', 'success')
</script>";
    ?>
    
    </p>
    <label for="">Dirección</label>
    <input type="text" name="direccion">
    </div>
    <button  type="submit" name="register" value="register" style="color:003366;background-color: #a69d9d" > registrar</button>

</form>

</CENter>

<?php

if(isset($_GET['creacion'])){
  $usuario = $_POST["usuario"];
  $contrasena = md5($_POST["clave1"]);
  $correo = $_POST["email"];
  $nombre = $_POST["nombre"];
  $apellido =$_POST["apellido"];
  $fechaN = $_POST["fechaNacimiento"];
  $cargp = $_POST["cargo"];
  $sexo = $_POST["sexo"];
  $rh = $_POST["RH"];
  $direccion = $_POST["direccion"];
  $identificacion = $_POST['identificacion'];
  
  $insertar = "INSERT usuarios(Usu_Nombre, Usu_Contraseña, Usu_Email) VALUES ('$usuario','$contrasena', '$correo')";
    $ejecutarInsert = mysqli_query( $conec,$insertar);
  if($insertar){
    $consultarR = "SELECT * FROM `usuarios` WHERE Usu_Email = '$correo'";
    $ejecutarR = mysqli_query($conec, $consultarR);
    while($fila = mysqli_fetch_array($ejecutarR)){
      $idUsuario = $fila['Usu_Id'];

    }

    //////////=======
    $insertar2 = "INSERT personas(`Pers_Nombre`,`Pers_Apellido`,`Pers_FechNaci`,`Pers_Identificacion`,`Pers_Cargo`,`Pers_Sexo`,`Pers_Rh`,`Pers_Direccion`,`Pers_UsuId`) VALUES ('$nombre','$apellido', '$fechaN','$identificacion','$cargp','$sexo','$rh','$direccion','$idUsuario')";
    $ejecutarInsert2 = mysqli_query( $conec,$insertar2);
  }

  
    if($ejecutarInsert2){
    echo "<script>alert('Usuario  Creado Exitosamente')
    </script>";
    }else{
        echo "<script>alert('Usuario  NO Creado Exitosamente')
        </script>";
    }
echo "<script>
        setTimeout(() => {
        window.open('creaciousuario.php','_self')
        }, 2000);
    </script>";/*temporizador para recargar pagina*/
}
?>
<script src="../js/validadorContraseña.js"></script>
</body>
</html>

