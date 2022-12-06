<?php
include('../../models/conexion.php');

if(!empty($_POST["clase"])){
	$clase = explode("-", $_POST['clase']);
    $id_clase=$clase[0];
    $nombre_clase=$clase[1];

	$query = "SELECT id_familia, nombre_familia FROM clase_familia WHERE id_clase = $id_clase and nombre_clase = '$nombre_clase'";
	$result = mysqli_query($conection,$query);
	$html1="<option selected required>Seleccionar una familia</option>";
	echo $html1;
	foreach ($result as $value) {
		$html.="
		<option value='".$value['id_familia']."-".$value['nombre_familia']."'>".$value['id_familia']."-".$value['nombre_familia']."</option>";
	}
	echo $html;

}
?>

