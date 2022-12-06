<?php 
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        $sql=$conection->query(" call dep_eliminar($id)");
        if($sql==1){
            echo '<div class="alert alert-success"> Departamento eliminado correctamente</div>';
        }else{
            echo "<div class='alert alert-danger'>Error al eliminar departamento</div>";
        }
    }
?>