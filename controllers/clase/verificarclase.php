<?php
include('../../models/conexion.php');

if(!empty($_POST['dep']) and !empty($_POST['numero'])){
	$query = "SELECT * from clase_departamento where id_departamento = '". $_POST["dep"] ."' and id_clase ='". $_POST["numero"] ."'";
	$result = mysqli_query($conection,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
		echo "<span style='color:red' > Ya existe una clase con este número para el departamento.</span>";
		echo "<script>
		$('button').prop('disabled',true);
		$('#nombre').prop('disabled',true);
		</script>";
	}else{
		echo "<span style='color:green' > Número disponible para este departamento.</span>";
		echo "<script>
		$('button').prop('disabled',false);
		$('#nombre').prop('disabled',false);
		</script>"; 
	}
}
?>