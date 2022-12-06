<?php
include('../../models/conexion.php');

if(!empty($_POST["id"])){
	$query = "SELECT id_clase, nombre_clase FROM clase_departamento WHERE id_departamento='". $_POST["id"] ."'";
	$result = mysqli_query($conection,$query);
	$html1="<option selected required>Seleccionar una clase</option>";
	echo $html1;
	foreach ($result as $value){
		$html.="
		<option value='".$value['id_clase']."-".$value['nombre_clase']."'>".$value['id_clase']."-".$value['nombre_clase']."</option>";
	}
	echo $html;
}
?>