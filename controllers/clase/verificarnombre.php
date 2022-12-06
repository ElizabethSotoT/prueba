<?php
include('../../models/conexion.php');

if(!empty($_POST['numero'])
	and !empty($_POST['nombre'])){
	$query = "SELECT * from clases where id ='". $_POST["numero"] ."' and nombre ='". $_POST["nombre"] ."'";
	$result = mysqli_query($conection,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
		echo "<span style='color:red' > Ya existe una clase con este nombre.</span>";
		echo "<script>
		$('button').prop('disabled',true);
		</script>";
	}else{
		echo "<span style='color:green' > Nombre disponible.</span>";
		echo "<script>
		$('button').prop('disabled',false);
		</script>"; 
	}
}
?>