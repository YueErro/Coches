<?php

	$conexion = mysqli_connect("localhost", "root", "");
	if (!$conexion) {
	    die("Conexión fallida: " . mysqli_error());
	}
	$seleccion = mysqli_select_db($conexion, "phpcoches");
	if (!$seleccion) {
	    die("Error: No es posible establecer la conexión con la bd" . mysqli_error($conexion));
	}

	$codcoche = $_POST['codcoche'];
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

		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'phpcoches';

		$con = mysqli_connect($host, $user, $pass, $db) or die("No conectado");

		$sql = "UPDATE coche SET foto = '". $foto ."', marca = '". $marca ."', modelo = '". $modelo ."', wifi = ". $wifi .", gps = ". $gps .", bluetooth = ". $blu .", precio = ". $precio ." WHERE codcoche = ". $codcoche .";";

		mysqli_query($conexion, $sql) or die("No actualizado");

		header("Location: FabricaReg.php");

	}
	else
		header("Location: Modificar.html");
?>