<?php
include('../../models/conexion.php');

if(!empty($_POST["id"])){
	$query = "SELECT * from departamentos where id ='". $_POST["id"] ."'";
	$result = mysqli_query($conection,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
		echo "<span style='color:red' > ID ya existe.</span>";
		echo "<script>
		$('button').prop('disabled',true);
		$('#nombre').prop('disabled',true);
		</script>";
	}else{
		echo "<span style='color:green' > ID disponible para actualizar.</span>";
		echo "<script>
		$('button').prop('disabled',false);
		$('#nombre').prop('disabled',false);
		</script>"; 
	}
}
?>