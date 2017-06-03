<?php
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die("Conexión fallida: " . mysqli_error());
}
$seleccion = mysqli_select_db($conexion, "phpcoches");
if (!$seleccion) {
    die("Error: No es posible establecer la conexión con la bd" . mysqli_error($conexion));
}


$foto = $_POST['foto'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$wifi = $_POST['wifi'];
$gps = $_POST['gps'];
$blu = $_POST['blu'];
$precio = $_POST['precio'];

if(preg_match("/^(\d+?)$/", $precio))
{
	if( $wifi == 'elegir' )
		$wifi = 2;
	else if( $wifi == 'si' )
		$wifi = 1;
	else
		$wifi = 0;

	if( $gps == 'elegir' )
		$gps = 2;
	else if( $gps == 'si' )
		$gps = 1;
	else
		$gps = 0;
	
	if( $blu == 'elegir' )
		$blu = 2;
	else if ( $blu == 'si' )
		$blu = 1;
	else
		$blu = 0;

	
	$insertar = "insert into coche (foto, marca, modelo, wifi, gps, bluetooth, precio) values('". $foto ."', '". $marca ."', '". $modelo ."', ". $wifi .", ". $gps .", ". $blu .", ". $precio .");";
	
	if(mysqli_query( $conexion, $insertar) )
		header("Location: FabricaReg.php");
	else
		echo "Error de inserción";
		
}
?>
