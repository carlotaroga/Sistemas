<?php
//paso 1: establecer la conexión
$dsn = "mysql:host=localhost;dbname=apicrud";
$usuario = "root";
$contrasena = "";
$gd = new PDO($dsn, $usuario, $contrasena);

//paso 2: hacer la consulta
$sql = "DELETE FROM producto WHERE id=:i";
$resultado = $gd->prepare($sql);
$resultado->bindParam(":i", $_GET["id"]);
$resultado->execute();

//paso Final: cerrar la conexión
$gd = null;

echo 1;
?>