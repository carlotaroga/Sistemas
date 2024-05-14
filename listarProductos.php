<?php 
//paso 1: Establecer la conexion con la bd
$dsn = "mysql:host=localhost;dbname=apicrud";
$usuario = "root";
$contrasena = "";
$gd = new PDO($dsn, $usuario, $contrasena);

//paso 2: Hacer la consulta de la bd
$sql = "SELECT * FROM producto";
$resultado = $gd->prepare($sql);
$resultado->execute();
   
//paso 3: empaquetar en formato JSON para enviarlo a la API
$productos = $resultado->fetchALL(PDO::FETCH_ASSOC);
echo json_encode($productos);

//paso 4: cerrar la conexión
$gd = null;

?>