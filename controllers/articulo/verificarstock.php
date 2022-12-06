<?php
if(!empty($_POST['stock']) and !empty($_POST['cantidad'])){
	$stock =$_POST['stock'];
	$cantidad =$_POST['cantidad'];
	 	if($cantidad>$stock){
			echo "<span style='color:red' > Cantidad no puede ser mayor a stock.</span>";
			echo "<script>$('button').prop('disabled',true);</script>";
		}else{
			echo "<span style='color:green' > Cantidad menor o igual a stock.</span>";
			echo "<script>$('button').prop('disabled',false);</script>"; 
		}
	}else{
		echo "<span style='color:gray' >Ingresar cantidad.</span>";
	}

?>