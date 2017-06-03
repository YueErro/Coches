<?php
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die("Conexión fallida: " . mysqli_error());
}
$seleccion = mysqli_select_db($conexion, "phpcoches");
if (!$seleccion) {
    die("Error: No es posible establecer la conexión con la bd" . mysqli_error($conexion));
}
$haypedidos = @mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM pedido"));

$pedidos = mysqli_query($conexion, "SELECT * FROM pedido left join coche on pedido.codcoche = coche.codcoche");

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
				<h1 style="color: #3EAAC7; float:left">PEDIDOS</h1>
				<h1 style="color: #3EAAC7; float: right; padding-left: 835px"><a href="FabricaReg.php"> VER REGISTRO</a></h1>
			</div>
			<?php
			if($haypedidos == null){
			?>
				<p style="padding: 10px 10px 10px 10px">No hay pedidos en curso</p>
			<?php
			} else {
			?>
			
            <table style="padding: 10px 10px 10px 10px">
			<?php
			$fila = mysqli_fetch_array($pedidos);
			while ($fila != null){	
			?>
                <tr>
                    <td rowspan="6" width="300px">
                        <img src="<?php echo $fila[8]; ?>" width="90%" style="float: left">
                    </td>
                    <td>
                        <tr>
                            <th colspan="2"><?php echo $fila[9]; ?> - <?php echo $fila[10]; ?></th>
                        </tr>
                        <tr>
                            <td width="250">Número de pedido: <?php echo $fila[0]; ?></td>
                            <td width="150">Precio: <?php echo $fila[14]; ?>€</td>

                        </tr>
                        <tr>
                            <td width="250">Unidades: <?php echo $fila[5]; ?></td>
                            <td width="150">Color: <?php echo $fila[2]; ?></td>

                        </tr>
                        <tr>
                            <td width="250">WIFI:
								<?php if($fila[4] == 1){ ?>
									Sí
								<?php } else{ ?>
									No
								<?php } ?>
							</td>
                            <td width="150">GPS:
								<?php if($fila[3] == 1){ ?>
									Sí
								<?php } else{ ?>
									No
								<?php } ?>
							</td>
                        </tr>
                        <tr>
                            <td width="250">Bluetooth:
								<?php if($fila[6] == 1){ ?>
									Sí
								<?php } else{ ?>
									No
								<?php } ?>
							</td>
						</tr>
                    </td>
                </tr>
                <?php
					$fila = mysqli_fetch_array($pedidos);
				}
				?>
            </table>
			
			<?php
			}
			?>
        </div>
        <footer>
            <nav style="background-color: #3EAAC7; -webkit-border-radius: 10px; border-radius:10px; width: 100%; height: 50px">
                <p style="float: right; margin-right: 10px; margin-bottom: 20px">Copyright © 10 de marzo de 2017  &#8226  Sistemas Web  &#8226  Itziar Egiluz y Yue Erro</p>
            </nav>
        </footer>
    </body>
</html>