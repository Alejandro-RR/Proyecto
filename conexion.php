<?php

$servidor = 'localhost';
$bd = 'floristeria';
$user = 'root';
$pwd = '';

function conectarBD()
{

	global $servidor, $user, $pwd, $bd;
	$conexion = new mysqli($servidor, $user, $pwd, $bd);

	if ($conexion->connect_errno) {
		echo "Error: Fallo al conectarse a MySQL debido a: \n";
		echo "Errno: " . $conexion->connect_errno . "\n";
		echo "Error: " . $conexion->connect_error . "\n";
		exit;
	}
	$conexion->set_charset("utf8");

	return $conexion;
}

function desconectarBD($conexion)
{
	$conexion->close();
}

?>


