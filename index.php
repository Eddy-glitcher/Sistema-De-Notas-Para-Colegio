<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="shortcut icon" href="img/backpack.png" type="image/x-icon">

</head>
<body>
<?php
 include("conexion.php");
 $conec = conectar();

?>
	<center>
		<form action="?login" method="POST" style="background:url('login1.jpg');">
			<h1>login</h1>
			<label>Usuario</label>
			<input type="text" name="usuario" id="usuario" required>
			<label>Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" required>
            <input type="submit" value="enviar">
            <a href="creaciousuario.php">crear cuenta</a>
		</form>
		<?php
			if(isset($_GET['login'])){
				$usuario = $_POST['usuario'];
				$contrasena = md5($_POST['contrasena']);
				$consultarR = "SELECT * FROM `usuarios` WHERE Usu_Nombre = '$usuario' AND Usu_Contrasena = '$contrasena'";
				$ejecutarR = mysqli_query($conec, $consultarR);
				while($fila = mysqli_fetch_array($ejecutarR)){
				  $idUsuario = $fila['Usu_Id'];
				  $nombre = $fila['Usu_Nombre'];
			
				}
				if(!empty($idUsuario[0])){
					$consultarR2 = "SELECT * FROM `personas` WHERE Pers_UsuId = '$idUsuario'";
					$ejecutarR2 = mysqli_query($conec, $consultarR2);
					$fila = mysqli_fetch_array($ejecutarR2);
					$rol = $fila['Pers_Cargo'];
					$_SESSION['Id']=$idUsuario;
					switch ($rol) {
						case 'administrador':
							session_start();
							if(isset($_SESSION['Id'])==0){
								header("Location: administrador/indexAdmin.php");
							}
							break;
						case 'profesor':
							session_start();
							if(isset($_SESSION['Id'])==0){
								header("Location: docente/docente.php");
							}
							
							break;
						case 'estudiante':
							session_start();
							if(isset($_SESSION['Id'])==0){
								echo "<script>alert('$idUsuario')</script>";
								header("Location: estudiante/indexEstudiante.php?user='$idUsuario'");
							}
							
							break;
					}
				}else{
					echo "<script>alert('La contraseña es Incorrecta')
        			</script>";
					echo "<script>
						setTimeout(() => {
						window.open('index.php','_self')
						},0);
					</script>";/*temporizador para recargar pagina*/
				}
					
				}
			
		?>








	</center>

</body>
</html>