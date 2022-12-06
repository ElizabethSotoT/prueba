<?php 
    if(!empty($_GET["id"]) and !empty($_GET["nom_fam"])){
        $id=$_GET["id"];
        $nom_fam=$_GET["nom_fam"];
        $sql=$conection->query("call familia_eliminar($id, '$nom_fam')");
        if($sql==1){
            echo '<div class="alert alert-success"> Familia eliminado correctamente</div>';
        }else{
            echo "<div class='alert alert-danger'>Error al eliminar departamento</div>";
        }
    }
?>