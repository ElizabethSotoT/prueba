<?php
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["dep"]) 
        and !empty($_POST["numero"]) 
        and !empty($_POST["nombre"])){
        $id=$_POST["dep"];
        $number=$_POST["numero"];
        $nombre=$_POST["nombre"];

        $sql=$conection->query("call clase_alta($number, '$nombre', $id)");
        if ($sql==1){
            echo '<div class="alert alert-success"> Clase registrada correctamente</div>';
            header("location:../clase/index.php");
        }else{
            echo '<div class="alert alert-danger">Error al registrar clase</div>';
        }

    }else{
        echo '<div class="alert alert-waring">Campo vacío</div>';
    }
}
?>