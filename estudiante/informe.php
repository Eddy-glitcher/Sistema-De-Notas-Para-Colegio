
<?php  
    $Iduser = $_GET['user'];
    require('../fpdf/fpdf.php');
    include '../conexion.php';
    $conec= conectar();
    // $conexion = new PDO('mysql:host=127.0.0.1;dbname=colegio;charset=UTF8', 'root', '');
	// $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    class PDF extends FPDF
    {
    // Cabecera de página
        function Header()
        {
            // Logo
            // $this->Image('../img/logo.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(60);
            // Título
            $this->Cell(60,10,'Notas De Estudiante',0,0,'C');
           
            
            // Salto de línea
            $this->Ln(20);
        }
    
    // Pie de página
        function Footer()
            {
                // Posición: a 1,5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Número de página
                $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
            }
    }
    // $conexion = new PDO('mysql:host=localhost;dbname=colegio;charset=UTF8', 'root', '');
	// $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    
    $pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

             try{
                $sql2 = "SELECT CONCAT(P.Pers_Nombre,' ',P.Pers_Apellido) As nombre, M.Mat_Nombre, N.* FROM notas AS N INNER JOIN personas as P ON N.Not_PerId = P.Pers_Id INNER JOIN materias AS M ON N.Not_MatId = M.Mat_Id WHERE P.Pers_UsuId = $Iduser GROUP BY nombre";
                    $datos3=$conec->query($sql2);
                    foreach ($datos3 as $datos1 ) {
                        $pdf->Cell(60,10,'NOMBRE ESTUDIANTE: '.$datos1['nombre'],0,0,'C');
        
                    }
                } catch (Exception $e) {
                    die ("Se produjo un error".$e);	
                }
                $pdf->Ln(10);

$pdf->Cell(30,10,'MATERIA',1,0,'C',0);
$pdf->Cell(30,10,'NOTA 1',1,0,'C',0);
$pdf->Cell(30,10,'NOTA 2',1,0,'C',0);
$pdf->Cell(30,10,'NOTA 3',1,0,'C',0);
$pdf->Cell(30,10,'NOTA FINAL',1,0,'C',0);
$pdf->Cell(30,10,'FECHA',1,0,'C',0);
$pdf->Ln(10);



	try{
		$sql = "SELECT CONCAT(P.Pers_Nombre,' ',P.Pers_Apellido) As nombre, M.Mat_Nombre, N.* FROM notas AS N INNER JOIN personas as P ON N.Not_PerId = P.Pers_Id INNER JOIN materias AS M ON N.Not_MatId = M.Mat_Id WHERE P.Pers_UsuId = $Iduser";
			$datos=$conec->query($sql);
			foreach ($datos as $datos1 ) {
                $pdf->Cell(30,10,utf8_decode($datos1['Mat_Nombre']),1,0,'C',0);
                $pdf->Cell(30,10,$datos1['Not_Nota1'],1,0,'C',0);
                $pdf->Cell(30,10,$datos1['Not_Nota2'],1,0,'C',0);
                $pdf->Cell(30,10,$datos1['Not_Nota3'],1,0,'C',0);
                $pdf->Cell(30,10,$datos1['Not_Promedio'],1,0,'C',0);
                $pdf->Cell(30,10,$datos1['Not_FechaCrea'],1,0,'C',0);
				$pdf->Ln(10);
            }
		} 
	catch (Exception $e) {
			die ("Se produjo un error".$e);	
		}
        $pdf->Output();
        
?>




