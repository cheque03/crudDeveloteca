<?php 

$servidor = "mysql:dbname=empresa;host=localhost";
$usuario = "cheque";
$password = "y";

try {
	$pdo = new PDO($servidor, $usuario, $password);
	echo "conectado..";
	
} catch (PDOException $e) {
	
	echo "Conexion mala :(", $e->getMessage();
}

 ?>