<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="login" style=" position:absolute; left:37.5%; top:33%; background-color: #eaf8fc;
        background-image: linear-gradient(#fff, #d4e8ec); border-radius: 35px; border-width: 1px; border-style: solid; 
        border-color: #c4d9df #a4c3ca #83afb7; width: 300px; height: 120px; padding: 10px; margin: 0 20px 0 10px;">
            <center>
			<?php
				$codcoche = $_POST['codcoche'];
				$color = $_POST['color'];
				$gps = $_POST['gps'];
				$wifi = $_POST['wifi'];
				$u = $_POST['unidades'];
				$blu = $_POST['blu'];

				$conexion = mysqli_connect("localhost", "root", "");
				if (!$conexion) {
					die("Conexión fallida: " . mysqli_error());
				}
				$seleccion = mysqli_select_db($conexion, "phpcoches");
				if (!$seleccion) {
					die("Error: No es posible establecer la conexión con la bd" . mysqli_error($conexion));
				}

				$insertar = "INSERT INTO pedido (codcoche, color, gps, wifi, unidades, bluetooth ) VALUES( " . $codcoche . ",'" . $color . "'," . $gps . "," . $wifi . "," . $u . "," . $blu . ")" ;
				
				if (mysqli_query( $conexion, $insertar)) {
			?>
					<p>Pedido realizado correctamente</p>
					<br>
					<input type="button" onclick="location.href='Concesionario.php'" value="Aceptar" />
			<?php
				} else {
					echo "Error: " . $insertar . "<br>" . mysqli_error($conexion);
				}
			?>
			</center>
        </div>
    </body>
</html>
