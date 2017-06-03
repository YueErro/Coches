<?php
	$nom = $_POST['user'];
	$pass = $_POST['pass'];

	if( $nom == "fabricante" and $pass == "fabricante" )
		header("Location: Fabrica.php");

	else if( $nom == "concesionario" and $pass == "concesionario" )
		header("Location: Concesionario.php");
	
	else
		header("Location: Inicio.html");
?>