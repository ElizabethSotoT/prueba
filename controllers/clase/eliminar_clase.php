<?php 
    if(!empty($_GET["id"]) and !empty($_GET["nom_clase"])){
        $id=$_GET["id"];
        $nom_clase=$_GET["nom_clase"];
        $sql=$conection->query("call clase_eliminar($id, '$nom_clase')");
        if($sql==1){
            echo '<div class="alert alert-success"> Clase eliminado correctamente</div>';
        }else{
            echo "<div class='alert alert-danger'>Error al eliminar departamento</div>";
        }
    }
?>