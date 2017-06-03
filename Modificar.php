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
$foto = mysqli_query($conexion, "SELECT foto FROM coche where codcoche ='". $codcoche . "'");
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$gps = $_POST['gps'];
$wifi = $_POST['wifi'];
$blu = $_POST['blu'];
$precio = $_POST['precio'];
$f = $foto->fetch_assoc(); 
$ft = implode($f);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="insertar" style=" position:absolute; left:37.5%; top:13%; background-color: #eaf8fc;
        background-image: linear-gradient(#fff, #d4e8ec); border-radius: 35px; border-width: 1px; border-style: solid; 
        border-color: #c4d9df #a4c3ca #83afb7; width: 335px; height: 425px; padding-top: 10px; margin: 0 10px 0 10px;">
            <center><h2>Modificar</h2></center>
            <form action="http://localhost/PHP/Update.php" method="POST">
                <table border="0" cellspacing="10" cellpadding="1" style=" padding-left: 35px">
                    <tbody>
                        <tr>
                            <td>Foto</td>
                            <td><input type="url" name="foto" id="foto" value="<?php echo $ft; ?>" size="20" required/></td>
                            <input type="hidden" name="codcoche" value="<?php echo $codcoche; ?>">
                        </tr>
                        <tr>
                            <td>Marca</td>
                            <td><input type="text" name="marca" id="marca" value="<?php echo $marca; ?>" size="20" maxlength="20" required/></td>
                        </tr>
                        <tr>
                            <td>Modelo</td>
                            <td><input type="text" name="modelo" id="modelo" value="<?php echo $modelo; ?>" size="20" maxlength="20" required/></td>
                        </tr>
						<tr>
                            <td>Bluetooth</td>
                            <td>
                                <?php if( $blu == 2){ ?>
                                <input type="radio" name="blu" id="blu" value="si"/> Sí
                                <input type="radio" name="blu" id="blu" value="no" required/> No
								<input type="radio" name="blu" id="blu" value="elegir" checked/> A elegir
                                <?php }else if( $blu == 1){ ?>
                                <input type="radio" name="blu" id="blu" value="si" checked/> Sí
                                <input type="radio" name="blu" id="blu" value="no" /> No
                                <input type="radio" name="blu" id="blu" value="elegir" required/> A elegir
                                <?php } else{ ?>
                                <input type="radio" name="blu" id="blu" value="si" /> Sí
                                <input type="radio" name="blu" id="blu" value="no" checked/> No
                                <input type="radio" name="blu" id="blu" value="elegir" required/> A elegir
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>WIFI</td>
                            <td>
                                <?php if( $wifi == 2){ ?>
                                <input type="radio" name="wifi" id="wifi" value="si"/> Sí
                                <input type="radio" name="wifi" id="wifi" value="no" required/> No
                                <input type="radio" name="wifi" id="wifi" value="elegir" checked/> A elegir
                                <?php }else if( $wifi == 1){ ?>
                                <input type="radio" name="wifi" id="wifi" value="si" checked/> Sí
                                <input type="radio" name="wifi" id="wifi" value="no" /> No
                                <input type="radio" name="wifi" id="wifi" value="elegir" required/> A elegir
                                <?php } else{ ?>
                                <input type="radio" name="wifi" id="wifi" value="si" /> Sí
                                <input type="radio" name="wifi" id="wifi" value="no" checked/> No
                                <input type="radio" name="wifi" id="wifi" value="elegir" required/> A elegir
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>GPS</td>
                            <td>
                                <?php if( $gps == 2){ ?>
                                <input type="radio" name="gps" id="gps" value="si"/> Sí
                                <input type="radio" name="gps" id="gps" value="no" required/> No
                                <input type="radio" name="gps" id="gps" value="elegir" checked/> A elegir
                                <?php }else if( $gps == 1){ ?>
                                <input type="radio" name="gps" id="gps" value="si" checked/> Sí
                                <input type="radio" name="gps" id="gps" value="no" /> No
                                <input type="radio" name="gps" id="gps" value="elegir" required/> A elegir
                                <?php } else{ ?>
                                <input type="radio" name="gps" id="gps" value="si" /> Sí
                                <input type="radio" name="gps" id="gps" value="no" checked/> No
                                <input type="radio" name="gps" id="gps" value="elegir" required/> A elegir
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Precio</td>
                            <td><input type="text" name="precio" id="precio" value="<?php echo $precio; ?>" size="18" maxlength="12" required/> €</td>                           
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right"><input type="submit" value="Modificar" name="modificar" /></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>