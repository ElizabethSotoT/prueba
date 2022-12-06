<?php 
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        $sql=$conection->query("call articulo_eliminar($id)");
        if($sql==1){
            echo '<div class="alert alert-success"> Artículo eliminado correctamente</div>';
        }else{
            echo "<div class='alert alert-danger'>Error al eliminar artículo</div>";
        }
    }
?>