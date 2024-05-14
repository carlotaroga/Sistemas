<?php
//paso 1: establecer la conexión
$dsn = "mysql:host=localhost;dbname=apicrud";
$usuario = "root";
$contrasena = "";
$gd = new PDO($dsn, $usuario, $contrasena);

//paso 2: obtener los datos
$datosJSON = file_get_contents("php://input");
$datos = json_decode($datosJSON, true);
$nombre = $datos["nombre"];
$precio = $datos["precio"];

//paso 3: hacer la consulta
$sql = "INSERT INTO producto (nombre, precio) VALUES (:n,:p)";
$resultado = $gd->prepare($sql);
$resultado->bindParam(":n", $nombre);
$resultado->bindParam(":p", $precio);
$ok = $resultado->execute();

//paso 4: cerrar la conexión
$gd = null;

echo 1;
?>