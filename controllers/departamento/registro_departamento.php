<?php
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"])){
        $nombre=$_POST["nombre"];

        $sql=$conection->query(" call dep_alta('$nombre')");
        if ($sql==1){
            echo '<div class="alert alert-success"> Departamento registrado correctamente</div>';
            header("location:../departamento/index.php");
        }else{
            echo '<div class="alert alert-danger">Error al registrar departamento</div>';
        }

    }else{
        echo '<div class="alert alert-waring"> Nombre vacío</div>';
    }
}
?>