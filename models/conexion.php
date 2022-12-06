<?php
	$host= 'localhost';
	$user= 'root';
	$pass='';
	$db='bdcoppel';
	
	$conection= @mysqli_connect($server,$user,$pass,$db);
    //echo "conexion";
	//	$conection -> set_charset("utf8");

	if (!$conection){
		echo "Error en la conexión";
		}
?>