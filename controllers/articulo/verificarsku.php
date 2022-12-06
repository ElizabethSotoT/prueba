<?php
include('../../models/conexion.php');

if(!empty($_POST["sku"])){
	$query = "SELECT * from articulos where sku='". $_POST["sku"] ."'";
	$result = mysqli_query($conection,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
		echo "<span style='color:red' > SKU ya existe.</span>";
		echo "<script>
		$('#btnregistrar').prop('disabled',true);
		$('#articulo').prop('disabled',true);
		$('#modelo').prop('disabled',true);
		$('#marca').prop('disabled',true);
		$('select').prop('disabled',true);
		$('#stock').prop('disabled',true);
		$('#cantidad').prop('disabled',true);
		</script>";
	}else{
		echo "<span style='color:green' > SKU disponible para registrar.</span>";
		echo "<script>
		$('#btnregistrar').prop('disabled',false);
		$('select').prop('disabled',false);
		$('input').prop('disabled',false);
		</script>"; 
	}
}
?>