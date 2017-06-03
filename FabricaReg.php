<?php
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die("Conexión fallida: " . mysqli_error());
}
$seleccion = mysqli_select_db($conexion, "phpcoches");
if (!$seleccion) {
    die("Error: No es posible establecer la conexión con la bd" . mysqli_error($conexion));
}

$pedidos = mysqli_query($conexion, "SELECT * FROM coche");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fábrica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div style="padding: 15px 20px 5px 30px">
            <div style="display: inline-block; padding-left: 10px">
				<h1 style="color: #3EAAC7; float:left">REGISTRO</h1>
				<h1 style="color: #3EAAC7; float: right; padding-left: 835px"><a href="Fabrica.php"> VER PEDIDOS</a></h1>
			</div>

            <table style="padding: 10px 10px 10px 10px">
			<?php
			$fila = mysqli_fetch_array($pedidos);
			while ($fila != null){
			?>
                <tr>
				<form action="http://localhost/PHP/Modificar.php" method="POST">
                    <td rowspan="5" width="300px">
                        <img src="<?php echo $fila[1]; ?>" width="90%" style="float: left" name="foto" value="<?php echo $fila[1]; ?>">
                    </td>
                    <td>
                        <tr>
                            <th colspan="2"><input type="hidden" name="marca" value="<?php echo $fila[2]; ?>"><?php echo $fila[2]; ?> - <input type="hidden" name="modelo" value="<?php echo $fila[3]; ?>"><?php echo $fila[3]; ?></th>
                        </tr>
                        <tr>
                            <td width="250">Código: <input type="hidden" name="codcoche" value="<?php echo $fila[0]; ?>"><?php echo $fila[0]; ?></td>
                            <td width="150">Precio: <input type="hidden" name="precio" value="<?php echo $fila[7]; ?>"><?php echo $fila[7]; ?>€</td>

                        </tr>
                        <tr>
                            <td width="250">WIFI:
								<?php if($fila[4] == 2){ ?>
									<input type="hidden" name="wifi" value="<?php echo $fila[4]; ?>">A elegir
								<?php } else if($fila[4] == 1){ ?>
									<input type="hidden" name="wifi" value="<?php echo $fila[4]; ?>">Sí
								<?php } else{ ?>
									<input type="hidden" name="wifi" value="<?php echo $fila[4]; ?>">No
								<?php } ?>
							</td>
                            <td width="150">GPS:
								<?php if($fila[5] == 2){ ?>
									<input type="hidden" name="gps" value="<?php echo $fila[5]; ?>">A elegir
								<?php } else if($fila[5] == 1){ ?>
									<input type="hidden" name="gps" value="<?php echo $fila[5]; ?>">Sí
								<?php } else{ ?>
									<input type="hidden" name="gps" value="<?php echo $fila[5]; ?>">No
								<?php } ?>
							</td>
                        </tr>
                        <tr>
                            <td width="250">Bluetooth:
								<?php if($fila[6] == 2){ ?>
									<input type="hidden" name="blu" value="<?php echo $fila[6]; ?>">A elegir
								<?php } else if($fila[6] == 1){ ?>
									<input type="hidden" name="blu" value="<?php echo $fila[6]; ?>">Sí
								<?php } else{ ?>
									<input type="hidden" name="blu" value="<?php echo $fila[6]; ?>">No
								<?php } ?>
							</td>
							<td width="150px">
								    <input type="submit" value="Modificar" />
							</td>
						</tr>
                    </td>
				</form>
                </tr>
                <?php
					$fila = mysqli_fetch_array($pedidos);
				}
				?>
				<tr>
					<input type="button" onclick="location.href='Añadir.php'" value="Añadir nuevo" style="margin-left: 10px" />
				</tr>
            </table>
        
        </div>
        <footer>
            <nav style="background-color: #3EAAC7; -webkit-border-radius: 10px; border-radius:10px; width: 100%; height: 50px">
                <p style="float: right; margin-right: 10px; margin-bottom: 20px">Copyright © 10 de marzo de 2017  &#8226  Sistemas Web  &#8226  Itziar Egiluz y Yue Erro</p>
            </nav>
        </footer>
    </body>
</html>