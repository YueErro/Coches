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
        <title>Añadir</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="insertar" style=" position:absolute; left:37.5%; top:13%; background-color: #eaf8fc;
        background-image: linear-gradient(#fff, #d4e8ec); border-radius: 35px; border-width: 1px; border-style: solid; 
        border-color: #c4d9df #a4c3ca #83afb7; width: 350px; height: 400px; padding-top: 10px; margin: 0 10px 0 10px;">
            <center><h2>Añadir</h2></center>
            <form action="http://localhost/PHP/Add.php" method="POST">
                <table border="0" cellspacing="10" cellpadding="1" style=" padding-left: 35px">
                    <tbody>
                        <tr>
                            <td>Foto</td>
                            <td><input type="url" name="foto" id="foto" value="" size="24" required/></td>
                            
                        </tr>
                        <tr>
                            <td>Marca</td>
                            <td><input type="text" name="marca" id="marca" value="" size="24" maxlength="20" required/></td>
                        </tr>
                        <tr>
                            <td>Modelo</td>
                            <td><input type="text" name="modelo" id="modelo" value="" size="24" maxlength="20" required/></td>
                        </tr>
                        <tr>
                            <td>Bluetooth</td>
                            <td>
                                <input type="radio" name="blu" id="blu" value="si"/> Sí
                                <input type="radio" name="blu" id="blu" value="no" required/> No
								<input type="radio" name="blu" id="blu" value="elegir" required/> A elegir
                            </td>
                        </tr>
                        <tr>
                            <td>WIFI</td>
                            <td>
                                <input type="radio" name="wifi" id="wifi" value="si"/> Sí
                                <input type="radio" name="wifi" id="wifi" value="no" required/> No
								<input type="radio" name="wifi" id="wifi" value="elegir" required/> A elegir
                            </td>
                        </tr>
                        <tr>
                            <td>GPS</td>
                            <td>
                                <input type="radio" name="gps" id="gps" value="si"/> Sí
                                <input type="radio" name="gps" id="gps" value="no" required/> No
								<input type="radio" name="gps" id="gps" value="elegir" required/> A elegir
                            </td>
                        </tr>
                        <tr>
                            <td>Precio</td>
                            <td><input type="text" name="precio" id="precio" size="21" maxlength="12" placeholder="Introduce un entero" required/> €</td>                           
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right"><input type="submit" value="Añadir" name="añadir" /></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>