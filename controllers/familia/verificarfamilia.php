<?php
include('../../models/conexion.php');

if(!empty($_POST['numero']) and !empty($_POST['clase'])){
	$clase = explode("-", $_POST['clase']);
    $idclase=$clase[0];
    $nombre_clase=$clase[1];
	$query = "SELECT * from clase_familia where id_clase =$idclase and nombre_clase = '$nombre_clase' and id_familia ='". $_POST["numero"] ."'";
	$result = mysqli_query($conection,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
		echo "<span style='color:red' > Ya existe una familia con este número para esta clase.</span>";
		echo "<script>
		$('button').prop('disabled',true);
		$('#nombre').prop('disabled',true);
		</script>";
	}else{
		echo "<span style='color:green' > Número disponible para esta clase.</span>";
		echo "<script>
		$('button').prop('disabled',false);
		$('#nombre').prop('disabled',false);
		</script>"; 
	}
}
?>