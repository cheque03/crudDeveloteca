<?php 

$servidor = "mysql:dbname=empresa;host=127.0.0.1";
$usuario = "cheque";
$password = "y";

try {
	$pdo = new PDO($servidor, $usuario, $password);
	echo "conectado..";
	
} catch (PDOException $e) {
	
	echo "Conexion mala :(", $e->getMessage();
}

 ?>