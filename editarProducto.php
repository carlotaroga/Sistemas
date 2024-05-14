<?php
//paso 1: establecer la conexión
$dsn = "mysql:host=localhost;dbname=apicrud";
$usuario = "root";
$contrasena = "";
$gd = new PDO($dsn, $usuario, $contrasena);

//paso 2: obtener los datos
$id = $_GET["id"];
$datosJSON = file_get_contents("php://input");
$datos = json_decode($datosJSON, true);
$nombre = $datos["nombre"];
$precio = $datos["precio"];

//paso 3: hacer la consulta
$sql = "UPDATE producto SET nombre=:n, precio=:p WHERE id=:i";
$resultado = $gd->prepare($sql);
$resultado->bindParam(":n", $nombre);
$resultado->bindParam(":p", $precio);
$resultado->bindParam(":i", $id);
$ok = $resultado->execute();

//paso Final: cerrar la conexión
$gd = null;

echo 1;
?>