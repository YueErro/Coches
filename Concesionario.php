<?php
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die("Conexión fallida: " . mysqli_error());
}
$seleccion = mysqli_select_db($conexion, "phpcoches");
if (!$seleccion) {
    die("Error: No es posible establecer la conexión con la bd" . mysqli_error($conexion));
}

$result = mysqli_query($conexion, "SELECT * FROM coche");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Concesionario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div style="padding: 15px 20px 5px 30px">
            <h1 style="color: #3EAAC7; padding-left: 10px">CATÁLOGO DISPONIBLE</h1>
            
            <table style="padding: 10px 10px 10px 10px">
			<?php
			$fila = mysqli_fetch_array($result);
			while ($fila != null){	
			?>
                <tr>
					<form action="http://localhost/PHP/Pedido.php" method="POST">
                        <td rowspan="6" width="300px">
                            <img src="<?php echo $fila[1]; ?>" width="90%" style="float: left">
                        </td>
                        <td>
                            <tr>
                                <th colspan="2"><?php echo $fila[2]; ?> - <?php echo $fila[3]; ?></th>
                            </tr>
                            <tr>
                                <td width="250">Código: <input type="hidden" name="codcoche" value="<?php echo $fila[0]; ?>" /><?php echo $fila[0]; ?></td>
                                <td width="250" style="display: inline-block">Precio: <?php echo $fila[7]; ?>€</td>
                            </tr>
                            <tr>
                                <td width="250">Unidades:
                                    <input type="number" style="width: 60px" min="1" name="unidades" required/>
                                </td>
                                <td width="250">Color:
                                    <select name="color" required>
                                        <option value="" disabled selected hidden>-Seleccione un color-</option>
                                        <option>Amarillo</option>
                                        <option>Azul</option>
                                        <option>Blanco</option>
                                        <option>Gris</option>
                                        <option>Morado</option>
                                        <option>Negro</option>
										<option>Verde</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="250">WIFI:
    							<?php if($fila[4] == 2){ ?>
                                    <input type="radio" name="wifi" id="wifi<?php echo $fila[0]; ?>" value="1"/> Sí
                                    <input type="radio" name="wifi" id="wifi<?php echo $fila[0]; ?>" value="0" required/> No
    							<?php } else if($fila[4] == 1){ ?>
    								<input type="hidden" name="wifi" value="<?php echo $fila[4]; ?>" />Sí
    							<?php } else{ ?>
    								<input type="hidden" name="wifi" value="<?php echo $fila[4]; ?>" />No
    							<?php } ?>
                                </td>
                                <td width="250">GPS:
    							<?php if($fila[5] == 2){ ?>
                                    <input type="radio" name="gps" id="gps<?php echo $fila[0]; ?>" value="1"/> Sí
                                    <input type="radio" name="gps" id="gps<?php echo $fila[0]; ?>" value="0" required/> No
    							<?php } else if($fila[5] == 1){ ?>
    								<input type="hidden" name="gps" value="<?php echo $fila[5]; ?>" />Sí
    							<?php } else{ ?>
    								<input type="hidden" name="gps" value="<?php echo $fila[5]; ?>" />No
    							<?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="250">Bluetooth:
    							<?php if($fila[6] == 2){ ?>
                                    <input type="radio" name="blu" id="blu<?php echo $fila[0]; ?>" value="1"/> Sí
                                    <input type="radio" name="blu" id="blu<?php echo $fila[0]; ?>" value="0" required/> No
    							<?php } else if($fila[6] == 1){ ?>
    								<input type="hidden" name="blu" value="<?php echo $fila[6]; ?>" />Sí
    							<?php } else{ ?>
    								<input type="hidden" name="blu" value="<?php echo $fila[6]; ?>" />No
    							<?php } ?>
                                </td>
    							<td width="250px">
    								<input type="submit" value="Realizar pedido"/>
    							</td>
                            </tr>
						</td>
					</form>
                </tr>
				<?php
					$fila = mysqli_fetch_array($result);
				}	
				?>
            </table>            
        </div>
        <footer>
            <nav style="background-color: #3EAAC7; -webkit-border-radius: 10px; border-radius:10px; width: 100%; height: 50px">
                <p style="float: right; margin-right: 10px; margin-bottom: 20px">Copyright © 10 de marzo de 2017  &#8226  Sistemas Web  &#8226  Itziar Egiluz y Yue Erro</p>
            </nav>
        </footer>
    </body>
</html>